<!DOCTYPE html>
<html>
    <?php
                          session_start();
                          if(isset($_SESSION['username'])){                                                
    ?>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">

	</style>
    <link rel="stylesheet" href="css/bootstrap.min.css">	
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
</head>
<body>
<?php
include 'koneksi.php';

function hitungwaktu($value,$type){
	$detik = $value ;
	$tahun=0;$bulan=0;$minggu=0;$hari=0;$jam=0;$menit=0;
	while ($detik>=60) {
		if ($detik>=29030400) {
			$tahun = floor($detik / 29030400);
			$detik=$detik-(29030400*$tahun);
		}
		else if ($detik >= 2419200) {
			$bulan = floor($detik / 2419200 );
			$detik=$detik-(2419200*$bulan);
		}
		else if ($detik >= 604800) {
			$minggu = floor($detik / 604800 );
			$detik=$detik-(604800*$minggu);
		}
		else if ($detik >= 86400) {
			$hari = floor($detik / 86400 );
			$detik=$detik-(86400*$hari);
		}
		else if ($detik >= 3600) {
			$jam = floor($detik / 3600 );
			$detik=$detik-(3600*$jam);
		}
		else if ($detik >= 60) {
			$menit = floor($detik / 60 );
			$detik=$detik-(60*$menit);
		}    
	}

	$waktu="";
	if 	($bulan > 12 && $tahun>0) {
	    $waktu = $waktu.$tahun.' tahun ';
	}
	if ($bulan <= 12 && $bulan>0) {
	    $waktu = $waktu.$bulan.' bulan ';
	} 
	if ($minggu <= 4 && $minggu>0) {
	    $waktu = $waktu.$minggu.' minggu ';
	} 
	if ($hari <= 7 && $hari>0) {
	   $waktu = $waktu.$hari.' hari ';
	} 
	if ($jam <= 24 && $jam>0) {
	    $waktu = $waktu.$jam.' jam ';
	} 
	if ($menit <= 60 && $menit>0) {
		$waktu = $waktu.$menit.' menit ';
	}
	if ($detik <= 60 && $detik>0) {
	    $waktu = $waktu.$detik.' detik ';
	}
	
	if ($type=="td"){
		echo "<td>$waktu</td>";	
	}
	else if ($type=="th"){
		echo "<th>$waktu</th>";	
	}											    											                                   		
}

if (isset($_GET['tanggal'])) {
    $tgl1 = $_GET['tanggal1'];
    $tgl2 = $_GET['tanggal2'];
    if ($tgl1==null || $tgl2==null) {
        header("location: time.php");
    }
}
else{
    header("location: time.php");
}

function tglindo($tgl){
   $hasil= date('d-m-Y', strtotime($tgl));
   return $hasil;
}


function hitunghari($tglawal,$tglakhir,$delimiter) {
//    menetapkan parameter awal dan libur nasional
//    pada prakteknya data libur nasional bisa diambil dari database
 
//    $koneksi = mysqli_connect('localhost', 'root', '', 'harviacode');
//    $query = "SELECT * FROM liburnasional";
//    $result = mysqli_query($koneksi, $query);
//    while ($row = mysqli_fetch_array($result)) {
//        $liburnasional[] = tglindo($row['tgl']);
//    }
 
    $tgl_awal = $tgl_akhir = $minggu = $sabtu = $koreksi = $libur = 0;
    $liburnasional = array("01-05-2014","15-05-2014","27-05-2014","29-05-2014");
    
//    memecah tanggal untuk mendapatkan hari, bulan dan tahun
    $pecah_tglawal = explode($delimiter, $tglawal);
    $pecah_tglakhir = explode($delimiter, $tglakhir);
    
//    mengubah Gregorian date menjadi Julian Day Count
    $tgl_awal = gregoriantojd($pecah_tglawal[1], $pecah_tglawal[0], $pecah_tglawal[2]);
    $tgl_akhir = gregoriantojd($pecah_tglakhir[1], $pecah_tglakhir[0], $pecah_tglakhir[2]);
 
//    mengubah ke unix timestamp
    $jmldetik = 24*3600;
    $a = strtotime($tglawal);
    $b = strtotime($tglakhir);
    
//    menghitung jumlah libur nasional 
    for($i=$a; $i<$b; $i+=$jmldetik){
        foreach ($liburnasional as $key => $tgllibur) {
            if($tgllibur==date("d-m-Y",$i)){
                $libur++;
            }
        }
    }
    
//    menghitung jumlah hari minggu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="0"){
            $minggu++;
        }
    }
    
//    menghitung jumlah hari sabtu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="6"){
            $sabtu++;
        }
    }
 
//    dijalankan jika $tglakhir adalah hari sabtu atau minggu
    if(date("w",$b)=="0" || date("w",$b)=="6"){
        $koreksi = 1;
    }
    
//    mengitung selisih dengan pengurangan kemudian ditambahkan 1 agar tanggal awal cuti juga dihitung
    $jumlahcuti =  $tgl_akhir - $tgl_awal - $libur - $minggu - $sabtu - $koreksi + 1;
    return $jumlahcuti;
}


?>
<center>
	<h3>Filter Berdasarkan Tanggal Berkas Selesai Proses</h3>
	<form action="timefilter.php" method="GET">
		<input type="date" name="tanggal1"> s/d 
		<input type="date" name="tanggal2">
		<input type="submit" name="tanggal" value="Filter">
	</form>
<br/>
<font color="white" style="font-size: 120%; background-color: darkblue"><b>&emsp;<?php echo date('d F Y', strtotime($tgl1)).' sampai dengan '.date('d F Y', strtotime($tgl2)); ?>&emsp;</b></font>
</center>


<br/> &emsp;
<form action="assets/timefilter2.php" method="get">
	<input type="hidden" name="tanggal1" value="<?php echo $tgl1 ?>" />
	<input type="hidden" name="tanggal2" value="<?php echo $tgl2 ?>" />
<!-- 	<input type="submit" name="eksport" value="Export Ke Excel" class="btn btn-sm btn-success"> -->
</form>
<br/><br/>
						<p/>
                        <table id="example1" class="table table-bordered table-striped" style="width: 99%" align="center">
                        	<thead style="background-color: lightblue">
                            <tr>
                            	<th><center>No.</th></center>
                            	<th><center>No. Notifikasi</th></center>
                                <th><center>1->2</th></center>
                                <th><center>2->3</th></center>
                                <th><center>3->4</th></center>
                                <th><center>4->5</th></center>
                                <th><center>5->6</th></center>
                                <th style="background-color: pink"><center>6->7</th></center>
                                <th><center>7->8</th></center>
                                <th><center>8->9</th></center>
                                <th><center>9->10</th></center>
                                <th><center>10->11</th></center>
                                <th><center>11->12</th></center>
                                <th><center>Total</th></center>
                            </tr>
                            <thead>
                            <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM tracking_berkas WHERE id_keterangan=12 && tanggal BETWEEN '$tgl1' AND '$tgl2'") or die(mysql_error());
	                                $a=0;                                  
	                                    while($result = mysql_fetch_assoc($query)){
	                                    	$notif[$a]=$result['no_notifikasi'];
	                                    	$a++;
	                                    }
	                                    $b=0;
	                                    $no = 1;
	                                    $baris=-1;
	                                    $z=0;
	                                    while ($b<$a){
	                                    	$baris++;
	                                    	echo "<tr>";
	                                    	echo "<td>$no</td>";;
	                                    	$no_notifikasi = $notif[$b];
                                    		echo '<td><center><a href="info.php?notifikasi='.$no_notifikasi.'" target="_blank">'.$no_notifikasi.'</a></center></td>';                                    	
	                                    	$sql = mysql_query("SELECT * FROM tracking_berkas WHERE no_notifikasi='$no_notifikasi' order by id_keterangan ASC") or die(mysql_error());
	                                    	$c=0;
	                                    	while($data = mysql_fetch_assoc($sql)){
	                                    		$tgl[$c]=$data['tanggal'];
	                                    		$c++;
	                                    	}
	                                    	$d=0;
	                                    	$kolom=-1;
	                                    	while ($d<$c-1) {
	                                    		$kolom++;
		                                    	$awal=($tgl[$d]);
		                                    	$akhir=($tgl[$d+1]);
		                                    	$selisih = strtotime($akhir) -  strtotime($awal);		                                    		
		                                    	$estimasi[$baris][$kolom]=$selisih;	
	                                    		if ($d==5) {
	                                    			echo '<td style="background-color: pink">.</td>';
	                                    		}
	                                    		else{
	                                    			if ($selisih >86400) {
	                                    				$aw = tglindo($awal);
	                                    				$ak = tglindo($akhir);
		                                    			$harikerja = hitunghari($aw, $ak, "-");
		                                    			$harilibur=(floor($selisih/86400)) - ($harikerja-1);
		                                    			$selisih=$selisih-($harilibur*86400);
		                                    		}		
		                                    		hitungwaktu($selisih,"td");
												}
		                                    	$d++;
	                                    	}
	                                    	$b++;
	                                    	$no++;	                                   	 	
	                                   	 	
	                                   	 	$sql4 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$no_notifikasi' && id_keterangan=1") or die(mysql_error());
	                                    	while($m = mysql_fetch_assoc($sql4)){
	                                    		$mulai=$m['tanggal'];	                                    		
	                                    	}
	                                    	$sql5 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$no_notifikasi' && id_keterangan=12") or die(mysql_error());
	                                    	while($s = mysql_fetch_assoc($sql5)){
	                                    		$selesai=$s['tanggal'];	                                    		
	                                    	}   
	                                    	$sql6 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$no_notifikasi' && id_keterangan=6") or die(mysql_error());
	                                    	while($mp = mysql_fetch_assoc($sql6)){
	                                    		$mulaipekerjaan=$mp['tanggal'];	                                    		
	                                    	} 
	                                    	$sql7 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$no_notifikasi' && id_keterangan=7") or die(mysql_error());
	                                    	while($sp = mysql_fetch_assoc($sql7)){
	                                    		$selesaipekerjaan=$sp['tanggal'];	                                    		
	                                    	}         
	                                    	$totaltgl = (strtotime($selesai) -  strtotime($mulai)) - (strtotime($selesaipekerjaan) -  strtotime($mulaipekerjaan));
											$totalpengerjaan=$totaltgl;
											if ($totaltgl>86400) {
												$mulaib = tglindo($mulai);
		                                    	$kasihkeuser = tglindo($mulaipekerjaan);
		                                    	$prosessementara = strtotime($mulaipekerjaan) -  strtotime($mulai);
		                                    	if ($prosessementara>86400) {
		                                    		$harikerja = (hitunghari($mulaib, $kasihkeuser, "-"))-1;
			                                    	$harilibur=(floor($prosessementara/86400)) - $harikerja; 
		                                    	}
		                                    	else {
		                                    		$harilibur=0; 
		                                    	}
			                                    
			                                    $userdatang= tglindo($selesaipekerjaan);
			                                    $selesaib= tglindo($selesai);
			                                    $prosesrealisasi= strtotime($selesai) -strtotime($selesaipekerjaan);
			                                    if ($prosesrealisasi>86400) {
			                                    	$harikerja= (hitunghari($userdatang, $selesaib, "-"))-1; 
			                                    	$harilibur2= (floor($prosesrealisasi/86400)) - $harikerja; 
			                                    }
			                                    else {
			                                    	$harilibur2=0;
			                                    } 

			                                    $totallibur=$harilibur+$harilibur2;

			                                    $totalpengerjaan=$totalpengerjaan-($totallibur*86400);
											}
											
		                                    hitungwaktu($totalpengerjaan,"td");

	                                    	$berkas[$z]=$totalpengerjaan;
	                                    	$z++;
	                                    }	                                    
	                                    echo '</tr></tbody><tfoot style="background-color: lightgray"><tr><td>Rata-rata</th><td>.</td>';
	                                    $proses=0;                        	
			                        	$k2=0;                        	                        	
			                        	while ($k2<=$kolom) {
			                        		$total[$proses]=0;
			                        		$b2=0;
			                        		while ($b2<=$baris) {
			                        			$total[$proses]=$total[$proses]+$estimasi[$b2][$k2];
			                        			$b2++;
			                        		}
			                        		$k2++;
			                        		$proses++;                        		
			                        	}
			                        	$xyz=0;
			                        	$n=0;
			                        	while ($xyz<$proses) {
			                        		if ($xyz==5) {
	                                    			echo '<td style="background-color: pink">.</td>';
	                                    	}
	                                    	else{
				                        		$rata=($total[$xyz]/($b2));
												hitungwaktu($rata,"td"); 
												$temp[$n]=$rata/3600; 	
												$n++;										     
			                        		}
			                        		$xyz++;
			                        }






			                        	$abc=0;
			                        	$totalberkas=0;
			                        	while ($abc<$z) {
			                        	    	$totalberkas=$totalberkas+$berkas[$abc];			                        	    	
			                        	    	$abc++;
			                        	    }
			                        	$rata2=($totalberkas/($abc));
										hitungwaktu($rata2,"td");

									echo "</tr></tfoot>";	
		                        
                            ?>

                        </table>	
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>	
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>

        <script src="code/highcharts.js"></script>
        <script src="code/modules/exporting.js"></script>


<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Estimasi Waktu Pengerjaan'
    },
    
    xAxis: {
        categories: ['1-2', '2-3', '3-4', '4-5', '5-6', '7-8', '8-9', '9-10', '10-11', '11-12'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Waktu rata - rata yang dibutuhkan dalam pelaksanaan pekerjaan (jam)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Satuan jam',
        data: [<?= join($temp, ',') ?>]
    }]
});
		</script>


                        ?>
<center>
<h2><small><b> Proses Pekerjaan : </b></small></h2>
<img src="img/urutan.png" width="50%" />
</center>
</body>
<?php
    }
else {
    gagallogin();
}

function gagallogin(){
    echo '<center>
    <h3><font color="white">Maaf sepertinya anda belum Login, silahkan </font><a href="../index.php">login terlebih dahulu</a></h3>
    </center>
    ';
}                          
?>
</html>