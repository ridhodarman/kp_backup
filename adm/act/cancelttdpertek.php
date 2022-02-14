<?php
	include ('../../koneksi.php');
	$notifikasi			 = $_GET['notifikasi'];

	$tracking = mysql_query("DELETE FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=11") or die(error());

	if($tracking){
			echo '
			<script>
			alert("disposisi telah dibatalkan")
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

?>