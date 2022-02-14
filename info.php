<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Info Berkas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="script.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include 'koneksi.php'; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <font class="navbar-brand" style="color: white"> Info Berkas </font>
            </div>
            <!-- Top Menu Items -->

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             
                        </h1>
                            <?php
                            $notifikasi       = $_GET['notifikasi'];
                            $query = mysql_query("SELECT * FROM berkas WHERE no_notifikasi='$notifikasi'") or die(mysql_error());
                            while($data = mysql_fetch_assoc($query)){ 
                                
                            ?>
                            <table style="font-size: 120%">
                                <tr>
                                    <td>No. SPK</td>
                                    <td>:</td>
                                    <td><b><?php echo $data['no_spk']; ?> </b></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>No. Notifikasi</td>
                                    <td>:</td>
                                    <td><b><?php echo $notifikasi ?></b></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Judul Berkas</td>
                                    <td>:</td>
                                    <td><b><?php echo $data['judul']; ?></b></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pekerjaan Dimulai</td>
                                    <td>:&emsp;</td>
                                    <?php
                                    if ($data['tgl_pekerjaan_dimulai']=="0000-00-00") {
                                        echo "<td>-</td>";
                                    }
                                    else {
                                        echo '<td><b>'.date('d F Y', strtotime($data['tgl_pekerjaan_dimulai'])).'</b></td>';
                                    }
                                    ?>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pekerjaan Selesai</td>
                                    <td>:</td>
                                    <?php
                                    if ($data['tgl_pekerjaan_selesai']=="0000-00-00") {
                                        echo "<td>-</td>";
                                    }
                                    else {
                                        echo '<td><b>'.date('d F Y', strtotime($data['tgl_pekerjaan_selesai'])).'</b></td>';
                                    }
                                    ?>
                                    <td><br/>&nbsp;</td>
                                <tr>
                                    <?php
                                        $mulai    = date_create($data['tgl_pekerjaan_dimulai']);
                                        $selesai = date_create($data['tgl_pekerjaan_selesai']);
                                        if ($selesai < $mulai) {
                                            $c="-";
                                        }
                                        else {
                                            $diff  = date_diff( $mulai, $selesai );
                                            $a=($diff->days);
                                            $b=$a+1;
                                            $c=$b." hari";    
                                        }
                                    ?>
                                    <td>Durasi Pekerjaan</td>
                                    <td>:</td>
                                    <td><b><?php echo $c; ?></b></td>
                                </tr>
                                </tr>
                                    <?php
                                        $id=$data['id_unit_kerja'];
                                        $sql = mysql_query("SELECT * FROM unit WHERE id_unit='$id'") or die(mysql_error());;    
                                        while($result = mysql_fetch_assoc($sql)){  
                                            $namaunit=$result['nama_unit'];
                                        }
                                    ?>
                                <tr>
                                    <td>Unit Kerja</td>
                                    <td>:</td>
                                    <td><b><?php echo $namaunit; ?></b></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Uraian Pekerjaan</td>
                                    <td>:</td>
                                    <td><b><?php echo $data['uraian_pekerjaan']; ?></b></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tanggal SPK dibuat</td>
                                    <td>:</td>
                                    <?php
                                    if ($data['tgl_spk']=="0000-00-00") {
                                        echo "<td>-</td>";
                                    }
                                    else {
                                        echo '<td><b>'.date('d F Y', strtotime($data['tgl_spk'])).'</b></td>';
                                    }
                                    ?>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                    <?php
                                                $norab="-";
                                                $nilaiawal="-";
                                                $tglawal="-";
                                                $nilairealisasi="-";
                                                $tglrealisasi="-";
                                        $sql = mysql_query("SELECT * FROM rab WHERE no_notifikasi='$notifikasi'") or die(mysql_error());;    
                                        while($show = mysql_fetch_assoc($sql)){  
                                            $norab=$show['no_rab'];
                                            $nilaiawal=$show['rab_awal'];
                                            $tglawal=$show['tgl_rab_dibuat'];
                                            $nilairealisasi=$show['rab_realisasi'];
                                            $tglrealisasi=$show['tgl_rab_realisasi'];
                                        }
                                    ?>
                                 <tr>
                                    <td>No RAB</td>
                                    <td>:</td>
                                    <td><b><?php echo $norab; ?></b></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Nilai RAB Sementara</td>
                                    <td>:</td>
                                    <td><b>Rp. <?php echo $nilaiawal; ?></b>
                                    <?php
                                    if ($tglawal=="0000-00-00" || $tglawal=="-") {
                                        echo "-";
                                    }
                                    else {
                                        echo '<font color="gray"> dibuat tanggal : </font>'.date('d F Y', strtotime($tglawal));
                                    }
                                    ?>
                                    </td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Nilai Realisasi</td>
                                    <td>:</td>
                                    <td><b>Rp. <?php echo $nilairealisasi; ?></b>
                                    <?php
                                    if ($tglrealisasi=="0000-00-00" || $tglrealisasi=="-") {
                                        echo "-";
                                    }
                                    else {
                                        echo '<font color="gray"> dibuat tanggal : </font>'.date('d F Y', strtotime($tglrealisasi));
                                    }
                                    ?>
                                    </td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Selisih RAB Realisasi dan Sementara </td>
                                    <td>:</td><td><b>
                                    <?php
                                    if ($nilairealisasi==0) {
                                        echo "....";
                                    }
                                    else {
                                        if ($nilaiawal > $nilairealisasi) {
                                            $p=($nilairealisasi/$nilaiawal)*100;
                                        }
                                        else if ($nilaiawal < $nilairealisasi){
                                            $p=($nilaiawal/ $nilairealisasi)*100;
                                        }
                                        else {
                                            $p=100;
                                        }
                                        $p2=100-$p;
                                        echo $p2." %";
                                    }
                                    ?>
                                    </b></td></td>
                                    <td><br/>&nbsp;</td>
                                </tr>
                            </table>                          

                               
                            
                            <?php } ?>

        <center><h2><small><b>-- Tanggal Pengerjaan --</b></small></h2></center>

        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
    <thead>
    <tr style="background-color: lightblue">
        <th><center>No.</th></center>
        <th><center>Keterangan</th></center>
        <th><center>Tanggal</th></center>
    </tr>
    </thead>
    <tbody>                                
    <?php
        $query = mysql_query("SELECT * FROM tracking_berkas WHERE no_notifikasi='$notifikasi'") or die(mysql_error());
        $no = 1;
        while($result = mysql_fetch_assoc($query)){                                 
            echo '<tr>';
            echo "<td><center>".$no."</center></td>";
            $idket = $result['id_keterangan'];
            $sql5 = mysql_query("SELECT * FROM keterangan where id_keterangan='$idket'") or die(mysql_error());
            while($hasil = mysql_fetch_assoc($sql5)){
                echo '<td>'.$hasil['deskripsi'].'</td>';
            }
            echo '<td><center>'.date('d F Y -- H:i', strtotime($result['tanggal'])).'</center></td>';
            $no++;
        }
    ?>
    </tbody>
</table>   
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
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
function tglindo($tgl){
   $hasil= date('d-m-Y', strtotime($tgl));
   return $hasil;
}


function hitunghari($tglawal,$tglakhir,$delimiter) {
   $query = mysql_query("SELECT * FROM liburnasional");
   while ($row = mysql_fetch_assoc($query)) {
       $liburnasional[] = tglindo($row['tanggal']);
   }

 
    $tgl_awal = $tgl_akhir = $minggu = $sabtu = $koreksi = $libur = 0;
    
//    memecah tanggal untuk mendapatkan hari, bulan dan tahun
    $pecah_tglawal = explode($delimiter, $tglawal);
    $pecah_tglakhir = explode($delimiter, $tglakhir);
    
//    mengubah Gregorian date menjadi Julian Day Count
    $tgl_awal = gregoriantojd($pecah_tglawal[1], $pecah_tglawal[0], $pecah_tglawal[2]);
    $tgl_akhir = gregoriantojd($pecah_tglakhir[1], $pecah_tglakhir[0], $pecah_tglakhir[2]);
 
//    mengubah ke unix timestamp
    $jmldetik = 24*3600;
    $a = strtotime($tglawal);
    $b = strtotime($tglakhir);
    
//    menghitung jumlah libur nasional 
    for($i=$a; $i<$b; $i+=$jmldetik){
        foreach ($liburnasional as $key => $tgllibur) {
            if($tgllibur==date("d-m-Y",$i)){
                $libur++;
            }
        }
    }
    
//    menghitung jumlah hari minggu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="0"){
            $minggu++;
        }
    }
    
//    menghitung jumlah hari sabtu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="6"){
            $sabtu++;
        }
    }
 
//    dijalankan jika $tglakhir adalah hari sabtu atau minggu
    if(date("w",$b)=="0" || date("w",$b)=="6"){
        $koreksi = 1;
    }
    
//    mengitung selisih dengan pengurangan kemudian ditambahkan 1 agar tanggal awal cuti juga dihitung
    $jumlahc =  $tgl_akhir - $tgl_awal - $libur - $minggu - $sabtu - $koreksi + 1; 
    return $jumlahc;
}


function cariss($awal_c, $akhir_c) {
    setlocale(LC_TIME, 'id_ID.UTF8');
    $aaa=$awal_c;
    $bbb=$akhir_c;
     
    $query = mysql_query("SELECT * FROM liburnasional WHERE BETWEN '$awal_c' AND '$akhir_c'");
    // tanggalnya diubah formatnya ke Y-m-d 
    $awal_c = date_create_from_format('d-m-Y', $awal_c);
    $awal_c = date_format($awal_c, 'Y-m-d');
    $awal_c = strtotime($awal_c);
     
    $akhir_c = date_create_from_format('d-m-Y', $akhir_c);
    $akhir_c = date_format($akhir_c, 'Y-m-d');
    $akhir_c = strtotime($akhir_c);
     
    $haricuti = array();
    $sabtuminggu = array();
     
    for ($i=$awal_c; $i <= $akhir_c; $i += (60 * 60 * 24)) {
        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
            $haricuti[] = $i;
        } else {
            $sabtuminggu[] = $i;
        }
     
    }
    $jumlah_cuti = count($haricuti);
    $jumlah_sabtuminggu = count($sabtuminggu);
    $abtotal = $jumlah_cuti + $jumlah_sabtuminggu;

    foreach ($sabtuminggu as $value) {
        echo date('d-m-Y', $value) . " -> " . strftime("%A, %d %B %Y", date($value)) . "\n" . "<br>";
    }
    $aaa=date('Y-m-d',$awal_c);
    $bbb=date('Y-m-d',$akhir_c);
    $query = mysql_query("SELECT * FROM liburnasional WHERE tanggal BETWEEN '$aaa' AND '$bbb'");
    while ($row = mysql_fetch_assoc($query)) {
       echo $row['tanggal']; echo " -> "; echo $row['keterangan']; echo "<br/>";
   }
}

      
            $sql2 = mysql_query("SELECT * FROM tracking_berkas WHERE no_notifikasi='$notifikasi' order by id_keterangan ASC") or die(mysql_error());
            $a=0;
            while($nilai = mysql_fetch_assoc($sql2)){
              $tgl[$a]=$nilai['tanggal'];
              $a++;
            }            
            $keterangan[0]="Proses 1-2";
            $keterangan[1]="Proses 2-3";
            $keterangan[2]="Proses 3-4";
            $keterangan[3]="Proses 4-5";
            $keterangan[4]="Proses 5-6";
            $keterangan[5]="Proses 7-8";
            $keterangan[6]="Proses 8-9";
            $keterangan[7]="Proses 9-10";
            $keterangan[8]="Proses 10-11";
            $keterangan[9]="Proses 11-12";  
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
                if ($pengerjaan[$d] >86400) {
                    $aw = tglindo($awal);
                    $ak = tglindo($akhir);
                    $harikerja = hitunghari($aw, $ak, "-");
                    $harilibur=(floor($pengerjaan[$d]/86400)) - ($harikerja-1);
                    $pengerjaan[$d]=$pengerjaan[$d]-($harilibur*86400);
                }
                $total=$total+$pengerjaan[$d];
                $count[$d]=$keterangan[$d];
                $b++; 
                $d++;
              }                                                 
            }
            ?>



            <div id="footer">
<?php   $sql4 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=1") or die(mysql_error());
        while($m = mysql_fetch_assoc($sql4)){
            $mulai=$m['tanggal'];                                               
        }
        $sql5 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=12") or die(mysql_error());
        while($s = mysql_fetch_assoc($sql5)){
            $selesai=$s['tanggal'];                                             
        }   
        $sql6 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=6") or die(mysql_error());
        while($mp = mysql_fetch_assoc($sql6)){
            $mulaipekerjaan=$mp['tanggal'];                                             
        } 
        $sql7 = mysql_query("SELECT tanggal FROM tracking_berkas WHERE no_notifikasi='$notifikasi' && id_keterangan=7") or die(mysql_error());
        while($sp = mysql_fetch_assoc($sql7)){
            $selesaipekerjaan=$sp['tanggal'];                                               
        }         
        $totaltgl = (strtotime($selesai) -  strtotime($mulai)) - (strtotime($selesaipekerjaan) -  strtotime($mulaipekerjaan));
        $totalpengerjaan=$totaltgl;
        if ($totaltgl>86400) {
            $mulaib = tglindo($mulai);
            $kasihkeuser = tglindo($mulaipekerjaan);
            $prosessementara = strtotime($mulaipekerjaan) -  strtotime($mulai);
            if ($prosessementara>86400) {
                $harikerja = (hitunghari($mulaib, $kasihkeuser, "-"))-1;
                $harilibur=(floor($prosessementara/86400)) - $harikerja; 
            }
            else {
                $harilibur=0; 
            }
            
            $userdatang= tglindo($selesaipekerjaan);
            $selesaib= tglindo($selesai);
            $prosesrealisasi= strtotime($selesai) -strtotime($selesaipekerjaan);
            if ($prosesrealisasi>86400) {
                $harikerja= (hitunghari($userdatang, $selesaib, "-"))-1; 
                $harilibur2= (floor($prosesrealisasi/86400)) - $harikerja; 
            }
            else {
                $harilibur2=0;
            } 

            $totallibur=$harilibur+$harilibur2;

            $totalpengerjaan=$totalpengerjaan-($totallibur*86400)+86400;
        }
        if ($totalpengerjaan<604800) {
            $totalpengerjaan=$totalpengerjaan-86400;
        }
        else {
            $totalpengerjaan=$totalpengerjaan+86400;
        }
        echo '<center><br/><font color="purple"><b> Total Waktu Pengerjaan : ';  
        hitungwaktu($totalpengerjaan, "purple");
        echo "</b></font>(*Tidak termasuk sabtu, minggu dan libur nasional)";

    $j = mysql_num_rows( mysql_query("SELECT * FROM keterangan") );
    $p=$b/($j-1) *100;

echo '
    <div class="progress" style="width: 85%;">
                    <div class="progress-bar progress-bar" role="progressbar" aria-valuenow="'.$p.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$p.'%">'.$p.' % Complete
                    </div>
                </div>
';
?>
            <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto;"></div>
<br/>
<?php 
                  $c=0;
                        while ($c<$d) {
                            $proses = $count[$c];;
                            $jumlah = $pengerjaan[$c];
                            if ($c%2==0) {
                              $warna = "black";
                            }
                            else{
                              $warna = "blue";
                            }
                            $lanjut=$proses+1;
                            echo '<font color="'.$warna.'">'.$proses.' =</font>';
                            hitungwaktu($jumlah, $warna);
                            $c++;
                        }

            echo "<p/>";
             echo "<br/>Daftar sabtu, minggu dan libur nasional : ";
             echo "<br/>";
             $mulaii=tglindo($mulai);
             $mulaipekerjaann=tglindo($mulaipekerjaan);
             cariss($mulaii, $mulaipekerjaann);
             $selesaipekerjaann=tglindo($selesaipekerjaan);
             $selesaii=tglindo($selesai);
             cariss($selesaipekerjaann, $selesaii);
    $awal_c = '8-08-2016';
    $akhir_c = '15-08-2016';
         ?>
</center>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Waktu Pengerjaan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
                    <?php
                        $c=0;
                        while ($c<$d) {
                            $proses = $count[$c];;
                            $jumlah = $pengerjaan[$c];
                            ?>
                            [ 
                                '<?php echo $proses."..." ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                            $c++;
                        }
                        ?>
             
                    ]
    }]
});
    </script>
            <br/><br/>
            </div></div>




<?php
           
            
      

         
      

?>                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
