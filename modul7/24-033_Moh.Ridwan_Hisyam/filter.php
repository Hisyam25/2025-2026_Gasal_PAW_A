<?php
// halaman filter tanggal
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modul 7 - Reporting (Filter)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Laporan - Filter</h1>
        <form action="hasil.php" method="get" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Dari Tanggal</label>
                <input class="form-control" type="date" name="tgl1" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Sampai Tanggal</label>
                <input class="form-control" type="date" name="tgl2" required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary">Tampilkan</button>
            </div>
        </form>


        <hr>
        <p class="text-muted">Contoh tabel DB yang digunakan: <code>transaksi(id, tanggal, total, pelanggan)</code></p>
    </div>
</body>

</html>