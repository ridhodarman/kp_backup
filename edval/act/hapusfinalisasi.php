<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE id_keterangan=4 && no_notifikasi='$notifikasi'") or die(error());
	$updatestatus = mysql_query("UPDATE berkas SET status=3 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus){
			echo '
			<script>
			alert("Finalisasi berkas telah dibatalkan")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../berkasfinalisasi.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../berkasfinalisasi.php">
		';	
	}

