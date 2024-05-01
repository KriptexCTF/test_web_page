<!DOCTYPE html>
<html class="profile">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/main.css">
        <title>Утенков М.М.</title>
        <div class="navigation">
            <a href="index.php" class="active">Home</a>
            <a href="#about">About me</a>
            <a href="#contact">Contact</a>
            <img class="logo" src="image/PT_logo.png">
        </div>
        <div class="under_bar">
            <p>Утенков Максим Михайлович</p>
        </div>
    </head>
    <body>
        <div class="container-1">
            <div class="row">
                <div class="col-6">
                    <p><br />Эта тестовая страничка была сделана специально для PT Start.</p>

                </div>
            </div>
        </div>
        <div class="container-2" id="about">
            <h2 class="about_me">
                <img src="image/programmer.gif" class="prog_gif">
                Максим - опытный специалист по информационной безопасности,
                специализирующийся на цифровой форензике.
                Его глубокие знания в области компьютерной безопасности и
                опыт в проведении расследований делают его одним из лидеров в этой сфере.
                Максим предан своей работе и всегда готов применить свои навыки для защиты
                информации и выявления преступлений в цифровом пространстве.<br \>
            </h2>
            <h2 class="about_me"><br \>Форензика - это наука о восстановлении и анализе цифровых
                следов, оставленных в компьютерных системах и сетях. Этот увлекательный
                процесс позволяет специалистам по информационной безопасности раскрывать
                преступления, выявлять уязвимости в системах и предотвращать кибератаки.<br \><br \><br \>
            </h2>
            <h2 align="center"><img src="image/security-gif.gif" class="gif2"><br \><br \><br \></h2>
        </div>
        <div class="container-1">
            <div class="button_js_hacker">
                <button id="myButton">Click me</button>
                <p id="demo"></p>
            </div>
        </div>
        <div class="post_form">
            <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                <p class="form_text">Создайте свой пост</p>
                <input type="text" class="form" name="title" placeholder="Введите заголовок вашего поста">
                <textarea class="form" name="text" cols="30" rows="10" placeholder="Введите текст..."></textarea>
		<input class="input_file" type="file" name="file" /><br>
                <button type="submit" class="button_js" name="submit">Сохранить пост!</button>
            </form>
        </div>
        <div class="contact" id="contact">
            <div class="data">
                <p>mail: test@test.test</p>
                <p>phone: 8-800-555-35-55</p>
            </div>
        </div>
        <script type="text/javascript" src="js/button.js" defer></script>
    </body>
</html>
<?php
    require_once('db.php');
    $link = mysqli_connect('db', 'root', 'kali', 'first_db');
    if (isset($_POST['submit'])){
	$title = $_POST['title'];
	$main_text = $_POST['text'];
	if (!$title || !$main_text) die ('Пожалуйста заполните все поля!');
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
        if(!mysqli_query($link, $sql)) die ('Не удалось добавить пост');
    }
    if(!empty($_FILES["file"])) {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
?>
