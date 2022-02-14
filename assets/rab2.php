<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include '../koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rab.xls");
?>

						<p/>
                        <table border="1" align="center">
                        	<thead style="background-color: lightblue">
                            <tr>
                            	<th><center>No.</th></center>
                            	<th><center>No. RAB</th></center>
                            	<th><center>No. Notifikasi</th></center>
                                <th><center>RAB Awal</th></center>
                                <th><center>RAB Realisasi</th></center>
                                <th><center>Selisih RAB</th></center>
                                <th><center>Persentase Selisih RAB</th></center>
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
	                            $no=1;
	                            $b=0;
	                            $rab_awal=0;
	                            $rab_realisasi=0;
	                            $t=0;
	                            while ($b < $a) {
	                            	$notifikasi=$notif[$b];
	                            	$sql = mysql_query("SELECT * FROM rab WHERE no_notifikasi='$notifikasi'") or die(mysql_error());
	                            	while ($data = mysql_fetch_assoc($sql)) {
	                            		echo "<tr>";
	                            		echo "<td>$no</td>";
	                            		echo "<td>".$data['no_rab']."</td>";
	                            		echo '<td><center>'.$notifikasi.'</center></td>';                            		
	                            		echo "<td>Rp. ".$data['rab_awal']."</td>";
	                            		echo "<td>Rp. ".$data['rab_realisasi']."</td>";
	                            		echo "<td> Rp. ".abs($data['rab_awal'] - $data['rab_realisasi'])."</td>";
	                            		if($data['rab_realisasi']>$data['rab_awal']){
		                        		$p=($data['rab_awal']/$data['rab_realisasi'])*100;
		                        		$p2=100-$p;
                                        echo "<td>".$p2." %</td>";
			                        	}
			                        	else if($data['rab_realisasi']<$data['rab_awal']){
			                        		$p=($data['rab_realisasi']/$data['rab_awal'])*100;
                                            $p2=100-$p;
			                        		echo "<td>".$p2." %</td>";
			                        	}
	                            		echo "</tr>";
	                            		$no++;
	                            		$rab_awal=$rab_awal+$data['rab_awal'];
	                            		$rab_realisasi=$rab_realisasi+$data['rab_realisasi'];
	                            		$tempawal[$t]=$data['rab_awal'];
	                            		$tempreal[$t]=$data['rab_realisasi'];
	                            		$tempselisih[$t]=$p2;
	                            		$count[$t]=$t+1;
	                            		$t++;
	                            	}
	                            	$b++;	
	                            }    
	                            echo "</tbody>";
	                            
	                            echo '<tfoot style="background-color: lightgray"><tr>';  	
		                        	echo "<td>Total</td>";
		                        	echo "<td>.</td>";
		                        	echo "<td>.</td>";
		                        	echo "<td>Rp. ".$rab_awal."</td>";
		                        	echo "<td>Rp. ".$rab_realisasi."</td>";
		                        	echo "<td>.</td>";
		                        	if($rab_realisasi>$rab_awal){
		                        		$p=($rab_awal/$rab_realisasi)*100;
                                        $p2=100-$p;
		                        	}
		                        	else if($rab_realisasi<$rab_awal){
		                        		$p=($rab_realisasi/$rab_awal)*100;
                                        $p2=100-$p;
		                        	}
                                    else {
                                        $p2=100;
                                    }
                                    echo "<td> Rata-rata = ".$p2." %</td>";		                        	
		                        echo "<tfoot><tr>";
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




</body>
</html>