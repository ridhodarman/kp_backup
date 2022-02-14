<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Tracking Berkas</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: gray;
  font: 100%/1 "Helvetica Neue", Arial, sans-serif;
}

.form1 {
  position: absolute;
  top: 50%;
  left: 25%;
  margin: -10rem 0 0 -10rem;
  width: 20rem;
  height: 20rem;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  overflow: hidden;
}
.form1:hover > .form1-header, .form1.focused > .form1-header {
  width: 2rem;
}
.form1:hover > .form1-header > .text, .form1.focused > .form1-header > .text {
  font-size: 1rem;
  transform: rotate(-90deg);
}
.form1.loading > .form1-header {
  width: 20rem;
}
.form1.loading > .form1-header > .text {
  display: none;
}
.form1.loading > .form1-header > .loader {
  display: block;
}

.form1-header {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1;
  width: 20rem;
  height: 20rem;
  background: darkred;
  transition: width 0.5s ease-in-out;
}
.form1-header > .text {
  display: block;
  width: 100%;
  height: 100%;
  font-size: 300%;
  text-align: center;
  line-height: 20rem;
  color: #fff;
  transition: all 0.5s ease-in-out;
}
.form1-header > .loader {
  display: none;
  position: absolute;
  left: 5rem;
  top: 5rem;
  width: 10rem;
  height: 10rem;
  border: 2px solid #fff;
  border-radius: 50%;
  animation: loading 2s linear infinite;
}
.form1-header > .loader:after {
  content: "";
  position: absolute;
  left: 4.5rem;
  top: -0.5rem;
  width: 1rem;
  height: 1rem;
  background: #fff;
  border-radius: 50%;
  border-right: 2px solid darkred;
}
.form1-header > .loader:before {
  content: "";
  position: absolute;
  left: 4rem;
  top: -0.5rem;
  width: 0;
  height: 0;
  border-right: 1rem solid #fff;
  border-top: 0.5rem solid transparent;
  border-bottom: 0.5rem solid transparent;
}

@keyframes loading {
  50% {
    opacity: 0.5;
  }
  100% {
    transform: rotate(360deg);
  }
}
.form1-form {
  margin: 0 0 0 2rem;
  padding: 0.5rem;
}

.form1-input {
  display: block;
  width: 100%;
  font-size: 100%;
  padding: 0.5rem 1rem;
  box-shadow: none;
  border-color: #ccc;
  border-width: 0 0 2px 0;
}
.form1-input + .form1-input {
  margin: 10px 0 0;
}
.form1-input:focus {
  outline: none;
  border-bottom-color: darkred;
}

.form1-btn {
  position: absolute;
  right: 1rem;
  bottom: 1rem;
  width: 5rem;
  height: 5rem;
  border: none;
  background: darkred;
  border-radius: 50%;
  font-size: 0;
  border: 0.6rem solid transparent;
  transition: all 0.3s ease-in-out;
}
.form1-btn:after {
  content: "";
  position: absolute;
  left: 1rem;
  top: 0.8rem;
  width: 0;
  height: 0;
  border-left: 2.4rem solid #fff;
  border-top: 1.2rem solid transparent;
  border-bottom: 1.2rem solid transparent;
  transition: border 0.3s ease-in-out 0s;
}
.form1-btn:hover, .form1-btn:focus, .form1-btn:active {
  background: #fff;
  border-color: darkred;
  outline: none;
}
.form1-btn:hover:after, .form1-btn:focus:after, .form1-btn:active:after {
  border-left-color: darkred;
}





.form2 {
  position: absolute;
  top: 50%;
  left: 75%;
  margin: -10rem 0 0 -10rem;
  width: 20rem;
  height: 20rem;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  overflow: hidden;
}
.form2:hover > .form2-header, .form2.focused > .form2-header {
  width: 2rem;
}
.form2:hover > .form2-header > .text, .form2.focused > .form2-header > .text {
  font-size: 1rem;
  transform: rotate(-90deg);
}
.form2.loading > .form2-header {
  width: 20rem;
}
.form2.loading > .form2-header > .text {
  display: none;
}
.form2.loading > .form2-header > .loader {
  display: block;
}

.form2-header {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1;
  width: 20rem;
  height: 20rem;
  background: darkred;
  transition: width 0.5s ease-in-out;
}
.form2-header > .text {
  display: block;
  width: 100%;
  height: 100%;
  font-size: 250%;
  text-align: center;
  line-height: 20rem;
  color: #fff;
  transition: all 0.5s ease-in-out;
}
.form2-header > .loader {
  display: none;
  position: absolute;
  left: 5rem;
  top: 5rem;
  width: 10rem;
  height: 10rem;
  border: 2px solid #fff;
  border-radius: 50%;
  animation: loading 2s linear infinite;
}
.form2-header > .loader:after {
  content: "";
  position: absolute;
  left: 4.5rem;
  top: -0.5rem;
  width: 1rem;
  height: 1rem;
  background: #fff;
  border-radius: 50%;
  border-right: 2px solid darkred;
}
.form2-header > .loader:before {
  content: "";
  position: absolute;
  left: 4rem;
  top: -0.5rem;
  width: 0;
  height: 0;
  border-right: 1rem solid #fff;
  border-top: 0.5rem solid transparent;
  border-bottom: 0.5rem solid transparent;
}

@keyframes loading {
  50% {
    opacity: 0.5;
  }
  100% {
    transform: rotate(360deg);
  }
}
.form2-form {
  margin: 0 0 0 2rem;
  padding: 0.5rem;
}

.form2-input {
  display: block;
  width: 100%;
  font-size: 100%;
  padding: 0.5rem 1rem;
  box-shadow: none;
  border-color: #ccc;
  border-width: 0 0 2px 0;
}
.form2-input + .form2-input {
  margin: 10px 0 0;
}
.form2-input:focus {
  outline: none;
  border-bottom-color: darkred;
}

.form2-btn {
  position: absolute;
  right: 1rem;
  bottom: 1rem;
  width: 5rem;
  height: 5rem;
  border: none;
  background: darkred;
  border-radius: 50%;
  font-size: 0;
  border: 0.6rem solid transparent;
  transition: all 0.3s ease-in-out;
}
.form2-btn:after {
  content: "";
  position: absolute;
  left: 1rem;
  top: 0.8rem;
  width: 0;
  height: 0;
  border-left: 2.4rem solid #fff;
  border-top: 1.2rem solid transparent;
  border-bottom: 1.2rem solid transparent;
  transition: border 0.3s ease-in-out 0s;
}
.form2-btn:hover, .form2-btn:focus, .form2-btn:active {
  background: #fff;
  border-color: darkred;
  outline: none;
}
.form2-btn:hover:after, .form2-btn:focus:after, .form2-btn:active:after {
  border-left-color: darkred;
}
#footer{
  height:50px;
  width: 90%;
  vertical-align: middle;
  text-align: center;
  align-content: center;
  align-items: center;
  align-self: center;
  alignment-baseline: middle;
  line-height:50px;
  position:absolute;
  bottom:0px;
  font-weight: bold;
}
@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
.progress {
  height: 20px;
  margin-bottom: 20px;
  overflow: hidden;
  background-color: #f5f5f5;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
}
.progress-bar {
  float: left;
  width: 0;
  height: 100%;
  font-size: 12px;
  line-height: 20px;
  color: #fff;
  text-align: center;
  background-color: #337ab7;
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
  -webkit-transition: width .6s ease;
       -o-transition: width .6s ease;
          transition: width .6s ease;
}
.progress-striped .progress-bar,
.progress-bar-striped {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
          background-size: 40px 40px;
}
.progress.active .progress-bar,
.progress-bar.active {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
       -o-animation: progress-bar-stripes 2s linear infinite;
          animation: progress-bar-stripes 2s linear infinite;
}
.progress-bar-success {
  background-color: #5cb85c;
}
.progress-striped .progress-bar-success {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.progress-bar-info {
  background-color: #5bc0de;
}
.progress-striped .progress-bar-info {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.progress-bar-warning {
  background-color: #f0ad4e;
}
.progress-striped .progress-bar-warning {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.progress-bar-danger {
  background-color: #d9534f;
}
.progress-striped .progress-bar-danger {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
    </style>
<?php
function hitungwaktu($value, $warna){
  $detik = $value ;
  $tahun=0;$bulan=0;$minggu=0;$hari=0;$jam=0;$menit=0;
  while ($detik>=60) {
    if ($detik>=29030400) {
      $tahun = floor($detik / 29030400);
      $detik=$detik-(29030400*$tahun);
    }
    else if ($detik >= 2419200) {
      $bulan = floor($detik / 2419200 );
      $detik=$detik-(2419200*$bulan);
    }
    else if ($detik >= 604800) {
      $minggu = floor($detik / 604800 );
      $detik=$detik-(604800*$minggu);
    }
    else if ($detik >= 86400) {
      $hari = floor($detik / 86400 );
      $detik=$detik-(86400*$hari);
    }
    else if ($detik >= 3600) {
      $jam = floor($detik / 3600 );
      $detik=$detik-(3600*$jam);
    }
    else if ($detik >= 60) {
      $menit = floor($detik / 60 );
      $detik=$detik-(60*$menit);
    }    
  }

  $waktu="";
  if  ($bulan > 12 && $tahun>0) {
      $waktu = $waktu.$tahun.' tahun ';
  }
  if ($bulan <= 12 && $bulan>0) {
      $waktu = $waktu.$bulan.' bulan ';
  } 
  if ($minggu <= 4 && $minggu>0) {
      $waktu = $waktu.$minggu.' minggu ';
  } 
  if ($hari <= 7 && $hari>0) {
     $waktu = $waktu.$hari.' hari ';
  } 
  if ($jam <= 24 && $jam>0) {
      $waktu = $waktu.$jam.' jam ';
  } 
  if ($menit <= 60 && $menit>0) {
    $waktu = $waktu.$menit.' menit ';
  }
  if ($detik <= 60 && $detik>0) {
      $waktu = $waktu.$detik.' detik ';
  }
  echo '<font color="'.$warna.'">'.$waktu.'&emsp;&emsp;</font>'; 

}
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<br/>
<img src="img/ptsp.png" width="6%" height="100%" style="float: right;"/>
<br/>
<h1 style="color: white; font-size: 250%; text-align: center;"> Track Your Document </h1>

<form action="tracking.php#footer" method="post">
  <div class="form1">
    <header class="form1-header"><span class="text">No. SPK</span><span class="loader"></span></header>
    <div class="form1-form">&emsp;
      <font color="darkgreen"> Cari berdasarkan nomor SPK : </font><br/><br/><br/>
      <input class="form1-input" type="text" placeholder="nomor SPK" name="spk" />
      <button class="form1-btn" type="submit" name="cari1">form1</button>

    </div>
  </div>

  <div class="form2">
    <header class="form2-header"><span class="text">No. Notifikasi</span><span class="loader"></span></header>
    <div class="form2-form">
      <font color="darkgreen"> Cari berdasarkan nomor notifikasi : </font><br/><br/><br/>
      <input class="form2-input" type="text" placeholder="no notifikasi" name="notif" />
      <button class="form2-btn" type="submit" name="cari2">form1</button>
    </div>
  </div>
</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
  

    <script  src="js/index.js"></script>

<?php
include 'koneksi.php';
if(isset($_POST['cari1'])){
  if ($_POST['spk']!=null) {
    $nospk  = strtoupper($_POST['spk']) ;
    $sql = mysql_query("SELECT * FROM berkas WHERE UPPER(no_spk) like '%$nospk%'");
    if (mysql_num_rows($sql)==0) {
      echo '<script>alert("Data tidak ditemukan")</script>';
    }
    else{
      while ($result = mysql_fetch_assoc($sql)) {
        $notif=strtoupper($result['no_notifikasi']);
      }
      track($notif);
    } 
  }
  else {
    echo '<script>alert("Masukkan nomor SPK!")</script>';
  }
}



if (isset($_POST['cari2'])) {
  if ($_POST['notif']!=null) {
    $notif = $_POST['notif'];
    track($notif);
  }
  else {
    echo '<script>alert("Masukkan nomor notifikasi!")</script>';
  }
}
?>


</body>


<?php
function track($value){

      $notif  = $value;
      $sql = mysql_query("SELECT max(id_keterangan) AS ket FROM tracking_berkas WHERE UPPER(no_notifikasi) LIKE '%$notif%'");  
      while ($result = mysql_fetch_assoc($sql)) {
        $idket = $result['ket'];
        $sql = mysql_query("SELECT * FROM berkas WHERE no_notifikasi='$notif'");  while ($result = mysql_fetch_assoc($sql)) { $judul=$result['judul'];  }
        if ($idket != null) {
          $query = mysql_query("SELECT * FROM keterangan WHERE id_keterangan='$idket'");
          while ($data = mysql_fetch_assoc($query)) {
             $show = $data['deskripsi'];
          }
            $sql2 = mysql_query("SELECT * FROM tracking_berkas WHERE no_notifikasi='$notif' order by id_keterangan ASC") or die(mysql_error());
            $a=0;
            while($nilai = mysql_fetch_assoc($sql2)){
              $tgl[$a]=$nilai['tanggal'];
              $a++;
            }             
            $b=0;
            $d=0;
            $total=0;
            while ($b<$a-1) {
              if ($b==5) {
                $b++; 
              }
              else {
                $awal=($tgl[$b]);
                $akhir=($tgl[$b+1]);
                $pengerjaan[$d]= strtotime($akhir) -  strtotime($awal);
                $total=$total+$pengerjaan[$d];
                $b++; 
                $d++;
              }                                                 
            }
            ?>



            <div id="footer">
<?php
        if (isset($show)) {
            echo $show.'<br/>
                <font style="font-size: 90%">'.$judul.'
                (Nomor notifikasi : <a href="info.php?notifikasi='.$notif.'" target="_blank">'.$notif.'</a>)
                </font>';
          }

    $j = mysql_num_rows( mysql_query("SELECT * FROM keterangan") );
    $p=$b/($j-1) *100;

echo '
    <div class="progress" style="width: 85%; float: right;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$p.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$p.'%">'.$p.' % Complete
                    </div>
                </div>
';

           
            
        }
          
      
        else {
          echo '<script>alert("Data tidak ditemukan !")</script>';
        }

         
      }
  
}

?>

</html>
