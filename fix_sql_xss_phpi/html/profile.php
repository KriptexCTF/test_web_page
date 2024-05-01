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
    $link = mysqli_connect('127.0.0.1', 'root', '44236', 'first_db');

    $title = strip_tags($_POST['title']);
    $main_text = strip_tags($_POST['text']);

    $title = mysqli_real_escape_string($link, $title);
    $main_text = mysqli_real_escape_string($link, $main_text);
    if (isset($_POST['submit'])){
	$title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
	$main_text = htmlspecialchars($main_text, ENT_QUOTES, 'UTF-8');
	if (!$title || !$main_text) die ('Пожалуйста заполните все поля!');
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
        if(!mysqli_query($link, $sql)) die ('Не удалось добавить пост');
    }
    if(!empty($_FILES["file"])) {
	$errors = [];
	$allowedTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/x-png', 'image/png'];
	$maxFileSize = 102400;
	if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        	$errors[] = 'Произошла ошибка при загрузке файла.';
    	}
	$realFileSize = filesize($_FILES['file']['tmp_name']);
	if ($realFileSize > $maxFileSize) {
        	$errors[] = 'Файл слишком большой.';
    	}
	$fileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']);
    	if (!in_array($fileType, $allowedTypes)) {
        	$errors[] = 'Недопустимый тип файла.';
    	}
	if (empty($errors)) {
        $tempPath = $_FILES['file']['tmp_name'];
        $destinationPath = 'upload/' . uniqid() . '_' . basename($_FILES['file']['name']);
        if (move_uploaded_file($tempPath, $destinationPath)) {
            echo "Файл загружен успешно: " . $destinationPath;
        } else {
            $errors[] = 'Не удалось переместить загруженный файл.';
        }
    } else {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
    }
?>
