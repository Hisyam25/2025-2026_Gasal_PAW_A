<?php 
include "cek_session.php"; 
include "menu.php";

if($_SESSION['level'] != 1){
    echo "<h3>Anda tidak memiliki akses ke halaman ini!</h3>";
    exit();
}
?>

<h2>Halaman Data Master</h2>
<p>Hanya Level 1 (Admin) yang bisa mengakses halaman ini.</p>