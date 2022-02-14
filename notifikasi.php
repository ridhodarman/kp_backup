<?php
$n=0;
$n2=0;
$batas=0;
$simpano2=null; $pesan=null; $simpano=null; $tampilkan=null;
$query = mysql_query("SELECT * FROM berkas WHERE status < 6 && tgl_pekerjaan_dimulai <= CURDATE() order by tgl_pekerjaan_dimulai ASC");
while($result = mysql_fetch_assoc($query)){ 
    $notif = $result['no_notifikasi'];
    $mulai    = date_create($result['tgl_pekerjaan_dimulai']);
    $sekarang = date_create();
    $diff  = date_diff( $mulai, $sekarang );
    $a=($diff->days);
    $b=$a+1;
    if ($b <= 14) {
        $c="Berkas dengan nomor notifikasi ".$notif. " akan memulai pekerjaan dalam ".$b." hari lagi.";
        $tampilkan[$n] = $c;
        $simpano[$n] = $result['no_notifikasi'];
        $n++;
        $batas++;
    }
}

$query2 = mysql_query("SELECT * FROM berkas WHERE status < 6 && tgl_pekerjaan_dimulai >= CURDATE() order by tgl_pekerjaan_dimulai ASC");
while($result2 = mysql_fetch_assoc($query2)){ 
    $notif = $result2['no_notifikasi'];
    $mulai    = date_create($result2['tgl_pekerjaan_dimulai']);
    $sekarang = date_create();
    $diff  = date_diff( $mulai, $sekarang );
    $a=($diff->days);
    $b=$a+1;
    $c="Berkas dengan nomor notifikasi ".$notif. " sudah lewat dari tanggal pekerjaan ".$b." hari lalu.";
    $pesan[$n2] = $c;
    $simpano2[$n2] = $result['no_notifikasi'];
    $n2++;
}

$now   = date('Y-m-d');
$lewat = date('Y-m-d', strtotime('+7 days', strtotime($now)));
$sql = mysql_query("SELECT * FROM berkas WHERE status>=6 && tgl_pekerjaan_selesai <= CURDATE() order by tgl_pekerjaan_selesai ASC");
while($data   = mysql_fetch_assoc($sql)){ 
    $notif = $data['no_notifikasi'];
    $selesai  = date_create($data['tgl_pekerjaan_selesai']);
    $sekarang = date_create();
    $diff  = date_diff( $selesai, $sekarang );
    $a=($diff->days);
    $b=$a+1;
    if ($b  >= 7) {
        $c="Berkas laporan dengan nomor notifikasi ".$notif. " sudah lewat ".$b." hari dari tanggal pekerjaan selesai, segera evaluasi";
        $tampilkan[$n] = $c;
        $simpano[$n] = $data['no_notifikasi'];   
        $n++;
    }
}


function tampilnotif($n, $batas, $simpano, $tampilkan){
    $i=0;
    if ($i == $n) {
        echo '
            <li class="message-preview">
                <div class="media-body">
                    Tidak ada SPK yang memulai pekerjaan dalam waktu dekat.
                </div>
            </li>';
    }
    else {
        while ($i<$n) {
            if ($i < $batas) {                                
                 echo '
                        <li class="message-preview">
                            <a href="../info.php?notifikasi='.$simpano[$i].'" target="_blank">
                                <div class="media-body alert alert-danger">
                                    '.$tampilkan[$i].'
                                </div>
                            </a>
                        </li>';
            }
            else {                                
                echo '
                        <li class="message-preview">
                            <a href="../info.php?notifikasi='.$simpano[$i].'" target="_blank">
                                <div class="media-body alert alert-info">
                                    '.$tampilkan[$i].'
                                </div>
                            </a>
                        </li>';
            }
            $i++;
        }
    }    
}

function tampilpesan($n2, $simpano2, $pesan){
    $i=0;
    if ($i == $n2) {
        echo '
            <li class="message-preview"><a href="#">
                            <div class="media-body">
                                Kosong
                            </div></a>
                        </li>';
    }
    else {
        while ($i<$n2) {
            echo '
                        <li class="message-preview">
                            <a href="../info.php?notifikasi='.$simpano2[$i].'" target="_blank">
                                <div class="media-body">
                                    '.$pesan[$i].'
                                </div>
                            </a>
                        </li>';
            $i++;
        }
    }
}

?>