<?php
function error(){
echo '
		<script>
		alert("gagal proses data !")
		</script>
		
		';	
	}


if(isset($_POST['simpan'])){
	include ('../../koneksi.php');
	$notifikasi			 = $_POST['notifikasi'];
	$bulan				 = $_POST['tglspk'];
	$uraianpekerjaan	 = $_POST['uraianpekerjaan'];
	$mulai				 = $_POST['mulai'];
	$selesai			 = $_POST['selesai'];
	$norab				 = $_POST['norab'];
	$tglrab				 = $_POST['tglrab'];
	$nilairab			 = $_POST['nilairab'];

	$update = mysql_query("UPDATE berkas SET uraian_pekerjaan='$uraianpekerjaan', tgl_pekerjaan_dimulai='$mulai', tgl_pekerjaan_selesai='$selesai' WHERE no_notifikasi='$notifikasi'") or die(error());

	$cek =mysql_query("SELECT * FROM rab where no_notifikasi='$notifikasi'") or die(error());
    if(mysql_num_rows($cek) == 0){
    	$query = mysql_query("INSERT INTO rab VALUES ('$norab', '$notifikasi', '$tglrab', '$nilairab', 0, 0000-00-00)") or die(error());
    }
    else{
    	$query = mysql_query("UPDATE rab SET no_rab='$norab', tgl_rab_dibuat='$tglrab', rab_awal='$nilairab' WHERE no_notifikasi='$notifikasi'") or die(mysql_error());
    }

	if($update && $query){
			echo '
			<script>
			alert("detail berkas telah disimpan")
			</script>

			<meta  http-equiv="refresh" content="0.2;url=../prosesberkas.php">
			';
		}else{
			error();
			
		}
}
else{
	echo '<script>window.history.back()</script>';
}