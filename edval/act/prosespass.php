<?php
if(isset($_POST['edit'])){
	include ('../../koneksi.php');
	$username	= $_POST['username'];
	$lama	 	= md5($_POST['lama']);
	$baru	 	= md5($_POST['baru']);
	$ulang 	 	= md5($_POST['ulang']);

	if ($baru != $ulang)	{
		echo '
				<script>
				alert("Periksa kembali data anda")
				</script>

				<meta  http-equiv="refresh" content="0.2;url=../settings.php">
				';
	}
	else {
		$cek = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$lama'") or die(mysql_error());
		if (mysql_num_rows($cek)==0) {
			echo '
				<script>
				alert("Password yang anda masukkan salah !")
				</script>

				<meta  http-equiv="refresh" content="0.2;url=../settings.php">
				';
		}
		else {
			$query = mysql_query("UPDATE user SET password='$baru' WHERE username='$username'") or die(mysql_error());

			if($query){
					echo '
					<script>
					alert("berhasil update data")
					</script>

					<meta  http-equiv="refresh" content="0.2;url=../settings.php">
					';
				}
		}
		
	}
}