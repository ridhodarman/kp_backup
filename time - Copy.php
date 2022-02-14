<!DOCTYPE html>
<html>
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
	<img src="img/ptsp.png" width="6%" style="float: right;">
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
?>
<center>
	<h3>Filter Berdasarkan Tanggal Berkas Selesai Proses</h3>
	<form action="timefilter.php" method="GET">
		<input type="date" name="tanggal1">
		<input type="date" name="tanggal2">
		<input type="submit" name="tanggal" value="Filter">
	</form>
</center>


<br/> &emsp;
<a href="assets/time2.php"> <button class="btn btn-sm btn-success">Export Ke Excel</button> </a>
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
                                $query = mysql_query("SELECT * FROM berkas WHERE status=10") or die(mysql_error());
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
												hitungwaktu($totaltgl,"td");
	                                    	$berkas[$z]=$totaltgl;
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
</html>