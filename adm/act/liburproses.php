<?php
if(isset($_POST['submit'])){
	include ('../../koneksi.php');
	$tanggal	= $_POST['tanggal'];
	$keterangan	= $_POST['keterangan'];

	$input = mysql_query("INSERT INTO liburnasional VALUES ('$tanggal', '$keterangan')") or die(error());	
	
	//jika query input sukses
	if($input){
		echo '
		<script>
		alert("berhasil menambahkan data")
		</script>

		<meta  http-equiv="refresh" content="0.1;url=../inputlibur.php">
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

		<meta  http-equiv="refresh" content="0.1;url=../inputlibur.php">
		';	
}