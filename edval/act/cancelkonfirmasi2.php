<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=8");
	$updatestatus = mysql_query("UPDATE berkas SET status=6 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus){
			echo '
			<script>
			alert("Konfirmasi telah dibatalkan")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../rabrealisasi.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../rabrealisasi.php">
		';	
	}