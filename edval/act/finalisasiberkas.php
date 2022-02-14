<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("INSERT INTO tracking_berkas VALUES (NULL, '$notifikasi', '4', NOW())") or die(error());
	$updatestatus = mysql_query("UPDATE berkas SET status=4 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus){
			echo '
			<script>
			alert("berkas telah difinalisasi")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../prosesberkas.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../prosesberkas.php">
		';	
	}

