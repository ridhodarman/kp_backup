<?php
//memulai proses hapus data

if(isset($_GET['notifikasi'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('../../koneksi.php');

	$notifikasi = $_GET['notifikasi'];
	
	//cek ke database apakah ada data
	$cek = mysql_query("SELECT * FROM berkas WHERE no_notifikasi='$notifikasi'") or die(error());
	
	//jika data tidak ada
	if(mysql_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	
	}else{
		
		//jika data ada di database, maka melakukan query DELETE data
		$del = mysql_query("DELETE FROM berkas WHERE no_notifikasi='$notifikasi'");
		
		//jika query DELETE berhasil
		if($del){
				//Pesan jika proses hapus berhasil
			echo '<script>
					alert("berhasil menghapus data")						
				  </script>
				 <meta  http-equiv="refresh" content="0.1;url=../index.php#example1">';	 //redirect untuk kembali ke halaman beranda
			
		}else{
				//Pesan jika proses hapus gagal
			error();
		
		}
		
	}
	
	function error(){
		echo '<script>
					alert("berhasil menghapus data")						
				  </script>
				 <meta  http-equiv="refresh" content="0.1;url=../index.php">';	 //redirect untuk kembali ke halaman beranda
	}

}else{
	
	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
	
}
?>