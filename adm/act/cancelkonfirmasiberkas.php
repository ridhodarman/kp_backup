<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=5") or die(error());
	$updatestatus = mysql_query("UPDATE berkas SET status=4 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus){
			echo '
			<script>
			alert("konfirmasi berkas telah dibatalkan")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../berkasdariedval.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../berkasdariedval.php">
		';	
	}

