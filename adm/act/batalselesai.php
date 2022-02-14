<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$updatestatus = mysql_query("UPDATE berkas SET status=9 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($updatestatus){
			echo '
			<script>
			alert("penyelesaian berkas telah dibatalkan")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../riwayatselesai.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../riwayatselesai.php">
		';	
	}

