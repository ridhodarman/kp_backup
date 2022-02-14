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

	$update = mysql_query("UPDATE rab SET rab_realisasi='$rabrealisasi' WHERE no_notifikasi='$notifikasi'") or die(mysql_error());

	if($update){
			echo '
			<script>
			alert("berhasil menyimpan data")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../korin.php">
			';
		}else{
			error();
			
		}
}
else{
	echo '<script>window.history.back()</script>';
}