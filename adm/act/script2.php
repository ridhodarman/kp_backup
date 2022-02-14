<script type="text/javascript">

<?php
function koneksi(){
	include '../koneksi.php';
}
?>


function showJenis() {

<?php
koneksi();

$sql = mysql_query("SELECT * FROM departemen ORDER BY id_departemen ASC");
while ($data = mysql_fetch_array($sql))
{
	$departemen = $data['id_departemen'];
echo "if (document.form1.departemen.value == \"".$departemen."\")";
echo " {";
$query2 = mysql_query("SELECT * FROM jenis_unit WHERE id_departemen = '$departemen' ORDER BY id_jenis ASC");
$content = "document.getElementById('jenisunit').innerHTML = \"";
$content .= "<option></option>";

		while ($data2 = mysql_fetch_array($query2))
			{
$content .= "<option value=".$data2['id_jenis'].">".$data2['nama_jenis']."</option>";
			}

$content .= "\"";

echo $content;

echo "}\n";

	}

?>

}




function showUnit() {

<?php
koneksi();

$sql2 = mysql_query("SELECT * FROM jenis_unit ORDER BY id_jenis ASC");
while ($d = mysql_fetch_array($sql2))
{
	$jenis = $d['id_jenis'];
echo "if (document.form1.jenisunit.value == \"".$jenis."\")";
echo " {";
$query3 = mysql_query("SELECT * FROM unit WHERE id_jenis = '$jenis' ORDER BY id_unit ASC");
$show = "document.getElementById('unitkerja').innerHTML =\"";

		while ($data3 = mysql_fetch_array($query3))
			{
$show .= "<option value=".$data3['id_unit'].">".$data3['nama_unit']."</option>";
			}

$show .= "\"";

echo $show;

echo "}\n";

	}

?>

}

</script>




<?php
if(isset($_POST['edit'])){
	koneksi();
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

			<meta  http-equiv="refresh" content="0.2;url=index.php#example1">
			';
		}else{
		
			echo 'Gagal update data! ';		
			echo '<a href="index.php#example1">Kembali</a>';	
			
		}

}