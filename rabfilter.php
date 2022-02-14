<!DOCTYPE html>
<html>
    <?php
                          session_start();
                          if(isset($_SESSION['username'])){                                                
    ?>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
</head>
<body>
<?php
include 'koneksi.php';
if (isset($_GET['tanggal'])) {
    $tgl1 = $_GET['tanggal1'];
    $tgl2 = $_GET['tanggal2'];
    if ($tgl1==null || $tgl2==null) {
        header("location: rab.php");
    }
}
else{
    header("location: rab.php");
}
?>
<img src="img/ptsp.png" width="6%" style="float: right;">
<center>
    <h3>Filter Berdasarkan Tanggal RAB Realisasi Dibuat</h3>
    <form action="rabfilter.php" method="GET">
        <input type="date" name="tanggal1">
        <input type="date" name="tanggal2">
        <input type="submit" name="tanggal" value="Filter">
    </form>
<br/>
<font color="white" style="font-size: 120%; background-color: darkblue"><b>&emsp;<?php echo date('d F Y', strtotime($tgl1)).' sampai dengan '.date('d F Y', strtotime($tgl2)); ?>&emsp;</b></font>
</center>
<form action="assets/rabfilter2.php" method="get">
    <input type="hidden" name="tanggal1" value="<?php echo $tgl1 ?>" />
    <input type="hidden" name="tanggal2" value="<?php echo $tgl2 ?>" />
    <input type="submit" name="eksport" value="Export Ke Excel" class="btn btn-sm btn-success">
</form>
<br/><br/>
                        <p/>
                        <table id="example1" class="table table-bordered table-striped" style="width: 99%" align="center">
                            <thead style="background-color: lightblue">
                            <tr>
                                <th><center>No.</th></center>
                                <th><center>No. RAB</th></center>
                                <th><center>No. Notifikasi</th></center>
                                <th><center>RAB Awal</th></center>
                                <th><center>RAB Realisasi</th></center>
                                <th><center>Selisih RAB</th></center>
                                <th><center>Persentase Selisih RAB</th></center>
                            </tr>
                            <thead>
                            <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM berkas WHERE status=10") or die(mysql_error());
                                $a=0;                                  
                                while($result = mysql_fetch_assoc($query)){
                                    $notif[$a]=$result['no_notifikasi'];
                                    $a++;
                                }
                                $no=1;
                                $b=0;
                                $rab_awal=0;
                                $rab_realisasi=0;
                                $t=0;
                                while ($b < $a) {
                                    $notifikasi=$notif[$b];
                                    $sql = mysql_query("SELECT * FROM rab WHERE no_notifikasi='$notifikasi' && tgl_rab_realisasi BETWEEN '$tgl1' AND '$tgl2' ") or die(mysql_error());
                                    while ($data = mysql_fetch_assoc($sql)) {
                                        echo "<tr>";
                                        echo "<td>$no</td>";
                                        echo "<td>".$data['no_rab']."</td>";
                                        echo '<td><center><a href="info.php?notifikasi='.$notifikasi.'" target="_blank">'.$notifikasi.'</a></center></td>';                                 
                                        echo "<td>Rp. ".$data['rab_awal']."</td>";
                                        echo "<td>Rp. ".$data['rab_realisasi']."</td>";
                                        echo "<td> Rp. ".abs($data['rab_awal'] - $data['rab_realisasi'])."</td>";
                                        if($data['rab_realisasi']>$data['rab_awal']){
                                        $p=($data['rab_awal']/$data['rab_realisasi'])*100;
                                        echo "<td>".$p." %</td>";
                                        }
                                        else if($data['rab_realisasi']<$data['rab_awal']){
                                            $p=($data['rab_realisasi']/$data['rab_awal'])*100;
                                            echo "<td>".$p." %</td>";
                                        }
                                        echo "</tr>";
                                        $no++;
                                        $rab_awal=$rab_awal+$data['rab_awal'];
                                        $rab_realisasi=$rab_realisasi+$data['rab_realisasi'];
                                        $tempawal[$t]=$data['rab_awal'];
                                        $tempreal[$t]=$data['rab_realisasi'];
                                        $tempselisih[$t]=$p;
                                        $count[$t]=$t+1;
                                        $t++;
                                    }
                                    $b++;   
                                }    
                                echo "</tbody>";
                                
                                echo '<tfoot style="background-color: lightgray"><tr>';     
                                    echo "<td>Total</td>";
                                    echo "<td>.</td>";
                                    echo "<td>.</td>";
                                    echo "<td>Rp. ".$rab_awal."</td>";
                                    echo "<td>Rp. ".$rab_realisasi."</td>";
                                    echo "<td>.</td>";
                                    if($rab_realisasi>$rab_awal){
                                        $p=($rab_awal/$rab_realisasi)*100;
                                        $p2=100-$p;
                                    }
                                    else if($rab_realisasi<$rab_awal){
                                        $p=($rab_realisasi/$rab_awal)*100;
                                        $p2=100-$p;
                                    }
                                    else {
                                        $p2=100;
                                    }
                                    echo "<td> Rata-rata = ".$p2." %</td>";                                 
                                echo "<tfoot><tr>";
                            ?>

                        </table>    

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>  
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>

        <script src="code/highcharts.js"></script>
        <script src="code/modules/exporting.js"></script>

<div id="container" style="width: 97%; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Penggunaan Dana RAB'
    },
    subtitle: {
        text: '<?php echo date('d F Y', strtotime($tgl1)).' sampai dengan '.date('d F Y', strtotime($tgl2)); ?>'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        title: {
            text: 'Jumlah Berkas Yang Diproses'
        },
        categories: [<?= join($count, ',') ?>],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Dana RAB Yang Digunakan (Rp.)'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' rupiah'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'RAB Sementara',
        data: [<?= join($tempawal, ',') ?>]
    }, {
        name: 'RAB Realisasi',
        data: [<?= join($tempreal, ',') ?>]
    }]
});
        </script>
</div>
<br/><br/><br/><br/>

<div id="container2" style="width: 97%; height: 400px; margin: 0 auto"></div>



        <script type="text/javascript">

Highcharts.chart('container2', {

    title: {
        text: 'Persentase Selisih Penggunaan RAB Sementara dengan RAB Realisasi'
    },

    subtitle: {
        text: '<?php echo date('d F Y', strtotime($tgl1)).' sampai dengan '.date('d F Y', strtotime($tgl2)); ?>'
    },

    yAxis: {
        title: {
            text: 'Selisih RAB Sementara dengan RAB realisasi ( % )'
        }
    },
    xAxis: {
        title: {
            text: 'Jumlah Berkas Yang Diproses'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        name: 'Persentase selisih (%)',
        data: [<?= join($tempselisih, ',') ?>]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
        </script>
</div>


</body>
<?php
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