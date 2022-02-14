<?php
if(isset($_POST['submit'])){
	include ('../../koneksi.php');
	$spk		= $_POST['spk'];
	$notifikasi	= $_POST['notifikasi'];
	$unitkerja	= $_POST['unitkerja'];
	$judul		= $_POST['judul'];

	$input = mysql_query("INSERT INTO berkas (no_notifikasi, no_spk, judul, id_unit_kerja, status) VALUES ('$notifikasi', '$spk', '$judul', '$unitkerja', 1);") or die(mysql_error());

	$tracking = mysql_query("INSERT INTO tracking_berkas VALUES (NULL, '$notifikasi', '1', NOW())") or die(mysql_error());	
	
	//jika query input sukses
	if($input && $tracking){
		echo '
		<script>
		alert("berhasil menambahkan data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../index.php">
		';
	}else{
		
		error();
		
	}

}else{	

	
	echo '<script>window.history.back()</script>';

}

function error(){
	echo '		
		<script>
		alert("gagal menambahkan data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../index.php">
		';	
}