<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE id_keterangan=9 && no_notifikasi='$notifikasi'") or die(error());
	$updatestatus = mysql_query("UPDATE berkas SET status=7 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus){
			echo '
			<script>
			alert("Finalisasi berkas telah dibatalkan")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../rabselesai.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../rabselesai.php">
		';	
	}

