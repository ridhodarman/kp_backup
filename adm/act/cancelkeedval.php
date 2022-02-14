<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=2") or die(error());
	$updatestatus = mysql_query("UPDATE berkas SET status=1 WHERE no_notifikasi='$notifikasi'") or die(error());

	if($tracking && $updatestatus){
			echo '
			<script>
			alert("proses berkas telah di cancel")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../berkaskeedval.php">
			';
		}else{
			error();
			
		}

function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../berkaskeedval.php">
		';	
	}

?>