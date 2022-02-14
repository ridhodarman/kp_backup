<?php
if(isset($_POST['edit'])){
	include ('../../koneksi.php');
	$spk				 = $_POST['spk'];
	$notifikasi			 = $_POST['notifikasi'];
	$notifikasiperubahan = $_POST['notifikasiperubahan'];
	$unitkerja			 = $_POST['unitkerja'];
	$tanggal			 = $_POST['tanggal'];
	$judul				 = $_POST['judul'];

	$query = mysql_query("UPDATE berkas SET no_notifikasi='$notifikasiperubahan', no_spk='$spk', id_unit_kerja='$unitkerja', tgl_pekerjaan_dimulai='$tanggal', judul='$judul' WHERE no_notifikasi='$notifikasi'") or die(mysql_error());

	if($query){
			echo '
			<script>
			alert("berhasil update data")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../index.php#example1">
			';
		}else{
		
			echo 'Gagal update data! ';		
			echo '<a href="../index.php#example1">Kembali</a>';	
			
		}

}