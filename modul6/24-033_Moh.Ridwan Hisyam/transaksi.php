<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi Penjualan</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #eee; }
    </style>
    <script>
        function tambahBaris() {
            let table = document.getElementById("tabel-detail");
            let row = table.insertRow(-1);
            row.innerHTML = `
                <td>
                    <select name="barang_id[]" required>
                        <?php
                        $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                        while ($b = mysqli_fetch_array($barang)) {
                            echo "<option value='$b[id]'>$b[nama_barang]</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="qty[]" min="1" required></td>
            `;
        }
    </script>
</head>
<body>
    <h2>Input Transaksi Penjualan</h2>
    <form action="simpan.php" method="POST">
        <label>Tanggal Transaksi:</label><br>
        <input type="date" name="waktu_transaksi" required><br><br>

        <label>Pelanggan:</label><br>
        <select name="pelanggan_id" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php
            $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            while ($p = mysqli_fetch_array($pelanggan)) {
                echo "<option value='$p[id]'>$p[nama]</option>";
            }
            ?>
        </select><br><br>

        <label>Keterangan:</label><br>
        <textarea name="keterangan" rows="3" cols="40"></textarea><br><br>

        <h3>Detail Barang</h3>
        <table id="tabel-detail">
            <tr>
                <th>Nama Barang</th>
                <th>Qty</th>
            </tr>
            <tr>
                <td>
                    <select name="barang_id[]" required>
                        <?php
                        $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                        while ($b = mysqli_fetch_array($barang)) {
                            echo "<option value='$b[id]'>$b[nama_barang]</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="qty[]" min="1" required></td>
            </tr>
        </table>

        <button type="button" onclick="tambahBaris()">+ Tambah Barang</button><br><br>
        <button type="submit">Simpan Transaksi</button>
    </form>
</body>
</html>