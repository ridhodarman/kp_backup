<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("INSERT INTO tracking_berkas VALUES (NULL, '$notifikasi', '12', NOW())") or die(error());

	if($tracking){
			echo '
			<script>
			alert("berkas telah diberikan ke user")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../prosesrabselesai.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../prosesrabselesai.php">
		';	
	}