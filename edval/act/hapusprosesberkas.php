<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE id_keterangan=3 && no_notifikasi='$notifikasi'") or die(error());
	$updatestatus = mysql_query("UPDATE berkas SET status=2 WHERE no_notifikasi='$notifikasi'") or die(error());
	$delete = mysql_query("DELETE FROM rab WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus && $delete){
			echo '
			<script>
			alert("konfirmasi berkas telah dibatalkan")
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

