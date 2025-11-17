<?php
include "koneksi.php";

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

// Rekap harian
$q1 = mysqli_query($koneksi, "SELECT tanggal, SUM(total) AS pendapatan 
                              FROM transaksi 
                              WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'
                              GROUP BY tanggal");

$rekap = mysqli_fetch_all($q1, MYSQLI_ASSOC);

// Total kumulatif
$q2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_pelanggan,
                                     SUM(total) AS jml_pendapatan
                              FROM transaksi
                              WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");

$total = mysqli_fetch_assoc($q2);
?>

<h2>Grafik Pendapatan</h2>
<canvas id="myChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let label = <?= json_encode(array_column($rekap, "tanggal")); ?>;
let data  = <?= json_encode(array_column($rekap, "pendapatan")); ?>;

new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: 'Pendapatan',
            data: data
        }]
    }
});
</script>

<h2>Rekap</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Tanggal</th>
        <th>Pendapatan</th>
    </tr>

    <?php foreach($rekap as $r) { ?>
    <tr>
        <td><?= $r['tanggal']; ?></td>
        <td><?= number_format($r['pendapatan']); ?></td>
    </tr>
    <?php } ?>
</table>

<h2>Total</h2>
<ul>
    <li>Jumlah Pelanggan : <?= $total['jml_pelanggan']; ?></li>
    <li>Total Pendapatan : <?= number_format($total['jml_pendapatan']); ?></li>
</ul>

<!-- Tombol Export -->
<button style="background-color: #007BFF; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;" 
        onclick="window.location.href='print.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>'">
    Print
</button>
<button style="background-color: #007BFF; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;" 
        onclick="window.location.href='export_excel.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>'">
    Excel
</button>
