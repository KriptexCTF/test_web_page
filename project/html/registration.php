<!DOCTYPE html>
<html lang="ru" class="registration">
<head>
    <meta charset="UTF-8">
    <title>Reg Utenkov M.M.</title>
    <link rel="stylesheet" href="css/reg.css">
</head>
<body>
    <div class="container">
        <div class="reg_info">
            <h2>Регистрация</h2>
        </div>
        <div class="form">
            <form method="POST" action="registration.php">
                <div><input type="email" name="email" class="form-1" placeholder="Email"></div>
                <div><input type="text" name="login" class="form-1" placeholder="Login"></div>
                <div><input type="password" name="password" class="form-1" placeholder="Password"></div>
                <button type="submit" class="btn_reg" name="submit">Продолжить</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    require_once('db.php');
    if (isset($_COOKIE['User'])) {
    	header("Location: login.php");
    }
    $link = mysqli_connect('db', 'root', 'kali', 'first_db');
    if (isset($_POST['submit'])){
        $email = $_POST['email'];
        $username = $_POST['login'];
        $password = $_POST['password'];
        if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');
        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
        if(!mysqli_query($link, $sql)) {
            echo "Не удалось добавить пользователя";
        }
    }
?>
