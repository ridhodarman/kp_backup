<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <title> Adm - Monitoring Pengadaan Jasa Task Force</title>

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
    <?php
                          session_start();
                          if(isset($_SESSION['username'])){
                              if ($_SESSION['username']=="adm"){                                                 
    ?>
</head>
<?php include '../koneksi.php';
      include '../notifikasi.php';
?>
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
                <a class="navbar-brand" href="index.php">MONITORING PENGADAAN JASA TASK FORCE</a>                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"><font color="yellow"><?php echo $n ?></font></b></a>               
                    <ul class="dropdown-menu message-dropdown">
                        <?php
                            tampilnotif($n, $batas, $simpano, $tampilkan);
                        ?>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"><font color="gray"><?php echo $n2 ?></font></b></>
                    <ul class="dropdown-menu message-dropdown">
                        <?php
                            tampilpesan($n2, $simpano2, $pesan);
                        ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Akun <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                        <?php
            $a = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=1") );
            $b1 = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=2") );
            $b2 = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=3") );
            $c1 = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=4") );
            $c2 = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=5") );
            $d1 = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=6") );
            $d2 = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status>6 && status<=8") );
            $e = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=9") );
            $f = mysql_num_rows( mysql_query("SELECT * FROM berkas WHERE status=10") );
            ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">                
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Berkas SPK masuk [
                            <font color="red"><strong> <?php echo $a; ?> </strong></font> ]
                        </a>
                    </li>
                    <li>
                        <a href="berkaskeedval.php"><i class="fa fa-fw fa-wrench"></i> Berkas SPK Ke Edval SC & Jasa [
                            <font color="red"><strong> <?php echo $b1; ?> </strong></font> |
                            <font color="green"><strong> <?php echo $b2; ?> </strong></font> ]
                        </a>
                    </li>
                    <li>
                        <a href="berkasdariedval.php"><i class="fa fa-fw fa-table"></i> RAB awal yang telah selesai diproses oleh Edval SC & Jasa [
                            <font color="red"><strong> <?php echo $c1; ?> </strong></font> |
                            <font color="green"><strong> <?php echo $c2; ?> </strong></font> 
                        ]</a>
                    </li>
                    <li>
                        <a href="prosesrealisasi.php"><i class="fa fa-money fa-fw"></i> Proses RAB realisasi [
                            <font color="red"><strong> <?php echo $d1; ?> </strong></font> |
                            <font color="green"><strong> <?php echo $d2; ?> </strong></font> ]
                        </a>
                    </li>
                    <li class="active">
                        <a href="prosesrabselesai.php"><i class="fa fa-fw fa-edit"></i> RAB realisasi yang telah selesai [
                            <font color="blue"><strong> <?php echo $e; ?> </strong></font> ]
                        </a>
                    </li>
                    <li>
                        <a href="riwayatselesai.php"><i class="fa fa-fw fa-file"></i> Riwayat berkas yang telah selesai [
                            <font color="green"><strong> <?php echo $f; ?> </strong></font> ]</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../time.php#container" target="_blank"><i class="fa fa-clock-o fa-fw"></i> Lihat Waktu Pengerjaan</a>
                            </li>
                            <li>
                                <a href="../tracking.php" target="_blank"><i class="fa fa-fw fa-dashboard"></i> Tracking Berkas</a>
                            </li>
                            <li>
                                <a href="inputlibur.php">"></i> Data Libur Nasional</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="../img/ptsp.png" width="8%" height="100%" style="float: right;">
                        <h3 class="page-header">
                            Berkas SPK yang telah selesai diproses oleh Edval SC & Jasa 
                        </h3>

                        <h3><small>Berkas yang sudah dikonfirmasi</small></h3>
                            <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr style="background-color: lightblue">
                                <th><center>Nomor</th></center>
                                <th><center>No. SPK</th></center>
                                <th><center>No. Notifikasi</th></center>
                                <th><center>Judul</th></center>
                                <th><center>Unit Kerja</th></center>
                                <th><center>TTD Ka. Biro Pertek</th></center>
                                <th><center>Proses Ke User</th></center>
                                <th><center>Action</th></center>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM berkas WHERE status=9") or die(mysql_error());
                                $no = 1;
                                while($result = mysql_fetch_assoc($query)){                                 
                                    echo '<tr>';
                                    echo '<td><center>'.$no.'</center></td>';  
                                    echo '<td><center>'.$result['no_spk'].'</center></td>';
                                    $notif=$result['no_notifikasi'];
                                    echo '<td><center><a href="../info.php?notifikasi='.$notif.'" target="_blank">'.$result['no_notifikasi'].'</a></center></td>';
                                    echo '<td><center>'.$result['judul'].'</center></td>';
                                    $sql4 = mysql_query("SELECT * FROM unit where id_unit=".$result['id_unit_kerja']) or die(mysql_error());
                                    while($hasil = mysql_fetch_assoc($sql4)){
                                        echo '<td><center>'.$hasil['nama_unit'].'</center></td>';
                                    }

                                    $cekpertek = mysql_query("SELECT * FROM tracking_berkas where no_notifikasi='$notif' && id_keterangan=11") or die(mysql_error());
                                    $cekuser = mysql_query("SELECT * FROM tracking_berkas where no_notifikasi='$notif' && id_keterangan=12") or die(mysql_error());

                                    if(mysql_num_rows($cekpertek) == 0){
                                    echo '<td><center>
                                    <a href="act/ttdpertek.php?notifikasi='.$result['no_notifikasi'].'"><button type="button" class="btn btn-sm btn-warning">OK</button></a>
                                    </center></td>'; 
                                    }
                                    else{
                                        echo '<td><center><font color="darkgreen"><b>DONE</b></font>... ';
                                        if (mysql_num_rows($cekuser) == 0) {
                                            echo '<a href="act/cancelttdpertek.php?notifikasi='.$result['no_notifikasi'].'"><button type="button" class="btn btn-sm btn-default" onclick="return confirm(\'Cancel disposisi ?\')">X</button></a>';
                                        }
                                        echo '</center></td>';
                                    }




                                    if(mysql_num_rows($cekpertek) != 0){ 
                                        if(mysql_num_rows($cekuser) == 0){
                                        echo '<td><center>
                                        <a href="act/keuser2.php?notifikasi='.$result['no_notifikasi'].'"><button type="button" class="btn btn-sm btn-warning">OK</button></a>
                                        </center></td>'; 
                                        }
                                        else{
                                            echo '<td><center><font color="darkgreen"><b>DONE</b></font><p>
                                                  <a href="act/cancelkeuser2.php?notifikasi='.$result['no_notifikasi'].'"><button type="button" class="btn btn-sm btn-default" onclick="return confirm(\'Cancel ke user ?\')">X</button></a>
                                                  </center></td>';
                                        }
                                    }
                                    else{
                                        echo "<td>...</td>";  
                                    }



                                    if(mysql_num_rows($cekpertek) == 0){
                                    echo '<td><center>
                                    <a href="act/cancelkonfirmasiberkas2.php?notifikasi='.$result['no_notifikasi'].'"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm(\'Batalkan konfirmasi berkas ?\')">Batalkan konfirmasi</button></a>';
                                    }
                                    else {
                                    echo '<td><center>..';   
                                    }
                                    if(mysql_num_rows($cekuser) != 0){
                                    echo '<a href="act/selesai.php?notifikasi='.$result['no_notifikasi'].'"><button type="button" class="btn btn-sm btn-success">DONE</button></a>
                                    </center></td>'; 
                                    }
                                    echo '</center></td>'; 
                                    echo '</tr>';
                                    $no++;
                                }
                                echo "</tbody>";
                            ?>

                        </table>   
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


    <!-- Morris Charts JavaScript -->

   <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>  
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>

</body>

<?php
    }
    else {
        gagallogin();
    }
}                          
else { 
    gagallogin();
}

function gagallogin(){
    echo '<center>
    <h3><font color="white">Maaf sepertinya anda belum Login, silahkan </font><a href="../index.php">login terlebih dahulu</a></h3>
    </center>
    ';
}                          
?>
</html>
