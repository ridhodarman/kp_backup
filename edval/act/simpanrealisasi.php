<?php
function error(){
echo '
		<script>
		alert("gagal proses data")
		</script>
		
		
		';	
	}


if(isset($_POST['simpan'])){
	include ('../../koneksi.php');
	$notifikasi			 = $_POST['notifikasi'];
	$rabrealisasi		 = $_POST['rabrealisasi'];
	$tgl_rabrealisasi		 = $_POST['tgl_rabrealisasi'];

	$update = mysql_query("UPDATE rab SET rab_realisasi='$rabrealisasi', tgl_rab_realisasi='$tgl_rabrealisasi' WHERE no_notifikasi='$notifikasi'") or die(error());

	if($update){
			echo '
			<script>
			alert("berhasil menyimpan data")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../rabrealisasi.php">
			';
		}else{
			error();
			
		}
}
else{
	echo '<script>window.history.back()</script>';
}