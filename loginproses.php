<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = md5($_POST['password']);

$sql = mysql_query('SELECT * FROM user where username="'.$user.'" and password="'.$pass.'"')or die(mysql_error());
$row=mysql_fetch_array($sql);
if($row){
	session_start();
  	$_SESSION['username'] = $row['username'];
  	$_SESSION['password'] = $row['password'];
  	
	if($user=="adm"){
	header("location: adm/index.php");
	}
	else if($user=="edval"){
	header("location: edval/index.php");	
	}
}
else {
	echo '
		<script type="text/javascript">
		alert("username atau password salah");
		</script>
		<meta  http-equiv="refresh" content="0.2;url=index.php">
	';
}
?>
