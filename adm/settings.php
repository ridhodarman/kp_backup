<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

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
                                $username = $_SESSION['username'];                               
    ?>
</head>
<body>
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
                    <li>
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
                                <a href="inputlibur.php"><i class="fa fa-fw fa-calendar"></i> Data Libur Nasional</a>
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
                        <h1 class="page-header">
                             <small>Settings</small> 
                        </h1>
                        <form action="act/prosespass.php" method="post">

                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                           
                            <div class="form-group">
                                <label>Password Lama :</label><br>
                                <input type="password" name="lama" class="form-control" placeholder="masukkan password lama" style="width: 40%" required="true">
                            </div>

                            <div class="form-group">
                                <label>Password Baru :</label><br>
                                <input type="password" name="baru" class="form-control" placeholder="masukkan password baru" style="width: 40%" required="true">
                            </div>

                            <div class="form-group">
                                <label>Ulangi password :</label><br>
                                <input type="password" name="ulang" class="form-control" placeholder="ulangi password baru" style="width: 40%" required="true">
                            </div>

                            
                            <input type="submit" name="edit" class="btn btn-primary" value="Save" />
                        </form>
                        <div style="float: right">
                            <a href="index.php"><button class="btn btn-default"> < < Kembali</button></a>
                        </div>
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
