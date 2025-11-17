<?php
include "koneksi.php";

$waktu_transaksi = $_POST['waktu_transaksi'];
$keterangan = $_POST['keterangan'];
$pelanggan_id = $_POST['pelanggan_id'];
$barang_id = $_POST['barang_id'];
$qty = $_POST['qty'];

// Hitung total harga
$total = 0;
for ($i = 0; $i < count($barang_id); $i++) {
    $barang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT harga FROM barang WHERE id='$barang_id[$i]'"));
    $total += $barang['harga'] * $qty[$i];
}

// Simpan ke tabel master
$query_master = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                 VALUES ('$waktu_transaksi', '$keterangan', '$total', '$pelanggan_id')";
mysqli_query($koneksi, $query_master);

// Ambil ID transaksi
$id_transaksi = mysqli_insert_id($koneksi);

// Simpan detail barang
for ($i = 0; $i < count($barang_id); $i++) {
    $barang = $barang_id[$i];
    $jumlah = $qty[$i];
    mysqli_query($koneksi, "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty)
                            VALUES ('$id_transaksi', '$barang', '$jumlah')");
}

echo "<h3>Transaksi berhasil disimpan!</h3>";
echo "<a href='transaksi.php'>Kembali ke Form</a>";
?>