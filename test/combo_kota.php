<script language='javascript'>


function showKab()

{

<?php

mysql_connect('localhost','root','') or die("Koneksi gagal");

mysql_select_db('evaluasi_jasa_ptsp') or die("Database tidak bisa dibuka");

// membaca semua propinsi

$query = "SELECT * FROM departemen ORDER BY id_departemen ASC";

$hasil = mysql_query($query);

// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua

while ($data = mysql_fetch_array($hasil))

{

$prov = $data['id_departemen'];

// membuat IF untuk masing-masing propinsi

echo "if (document.form1.provinsi.value == \"".$prov."\")";

echo "{";

// membuat option kota untuk masing-masing propinsi

$query2 = "SELECT * FROM jenis_unit WHERE id_departemen = '$prov' ORDER BY id_jenis ASC";

$hasil2 = mysql_query($query2);

$content = "document.getElementById('kot').innerHTML = \"";

while ($data2 = mysql_fetch_array($hasil2))

{

$content .= "<option value=".$data2['id_jenis'].">".$data2['nama_jenis']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>