<?php
include "koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan.xls");

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

$q = mysqli_query($koneksi, "SELECT tanggal, SUM(total) AS pendapatan 
                             FROM transaksi 
                             WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
                             GROUP BY tanggal");
?>

<table border="1">
    <tr>
        <th>Tanggal</th>
        <th>Pendapatan</th>
    </tr>

<?php while ($r = mysqli_fetch_assoc($q)) { ?>
    <tr>
        <td><?= $r['tanggal'] ?></td>
        <td><?= $r['pendapatan'] ?></td>
    </tr>
<?php } ?>
</table>