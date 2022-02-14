<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

include("combo_kota.php");

?>

<?php

mysql_connect('localhost','root','') or die("Koneksi gagal");

mysql_select_db('evaluasi_jasa_ptsp') or die("Database tidak bisa dibuka");

?>

<form name='form1' method='post' id='form_combo'>

pilih provinsi : <select name='provinsi' onchange='showKab()'>

<option value="">pilih provinsi</option>

<?php

$prov = mysql_query("SELECT * FROM departemen order by id_departemen asc");

while($hasil = mysql_fetch_array($prov)){

echo '<option value='.$hasil['id_departemen'].'>'.$hasil['nama_departemen'].'</option>';

}

?>

</select>

<br/>

pilih kota : <select name='kota' id='kot'>

<option value="">pilih kota</option>

</select>

</form>
</body>
</html>