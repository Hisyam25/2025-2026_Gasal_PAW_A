<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body{
            font-family: Arial;
            background: #f0f0f0;
        }
        .login-box{
            width: 320px;
            padding: 20px;
            margin: 80px auto;
            background: white;
            box-shadow: 0 0 10px #999;
            border-radius: 5px;
        }
        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: blue;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3>Login</h3>

    <?php 
    if(isset($_SESSION['error'])){
        echo "<p style='color:red'>".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="proses_login.php">
        <input type="text" name="username" placeholder="Masukkan Username" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <button type="submit">Masuk</button>
    </form>
</div>

</body>
</html>