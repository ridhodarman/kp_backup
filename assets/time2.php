<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include '../koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=time.xls");

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
                        <table border="1" >
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
	                                    	echo "<td>$no_notifikasi</td>";	                                    	
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
			                        	while ($xyz<$proses) {
			                        		if ($xyz==5) {
	                                    			echo '<td style="background-color: pink">.</td>';
	                                    	}
	                                    	else{
				                        		$rata=($total[$xyz]/($b2));
												hitungwaktu($rata,"td");  											     
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
                        <br/><br/>
                        <?php
                        $query = mysql_query("SELECT * FROM keterangan") or die(mysql_error());                                 
	                        while($result = mysql_fetch_assoc($query)){
	                        	echo $result['id_keterangan'];
	                        	echo " : ";
	                        	echo $result['deskripsi'];
	                        	echo "<br/>";
	                        }

                        ?>

</body>
</html>