<html lang="ru" class="login">
<head>
    <meta charset="UTF-8">
    <title>Reg Utenkov M.M.</title>
    <link rel="stylesheet" href="css/log.css">
</head>
<body>
<div class="container">
    <div class="reg_info">
        <h2>Вход</h2>
    </div>
    <div class="form">
        <form method="POST" action="login.php">
            <div><input type="login" name="login" class="form-1" placeholder="Login"></div>
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
    	header("Location: profile.php");
    }
    $link = mysqli_connect('db', 'root', 'kali', 'first_db');
    if (isset($_POST['submit'])) {
        $username = $_POST['login'];
        $password = $_POST['password'];
        if (!$username || !$password) die ('Пожалуйста введите все значения!');
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time()+7200);
            header('Location: profile.php');
        } else{
            echo "Неправильное имя или пароль";
        }
    }
?>
