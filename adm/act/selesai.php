<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$updatestatus = mysql_query("UPDATE berkas SET status=10 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($updatestatus){
			echo '
			<script>
			alert("berkas telah selesai diproses")
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

