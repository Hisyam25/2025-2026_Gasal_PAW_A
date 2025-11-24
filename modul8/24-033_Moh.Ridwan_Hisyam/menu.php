<?php
$level = $_SESSION['level'];
?>

<nav style="padding:10px; background:#ddd;">
    <a href="index.php">Home</a> |

    <?php if($level == 1){ ?>
        <a href="master.php">Data Master</a> |
    <?php } ?>

    <a href="transaksi.php">Transaksi</a> |
    <a href="laporan.php">Laporan</a> |
    <a href="logout.php" style="color:red;">Logout</a>

    <span style="float:right;">
        Anda Login sebagai: <b><?=$_SESSION['nama'];?></b>
    </span>
</nav>