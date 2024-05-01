<!DOCTYPE html>
<html lang="ru" class="login">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Utenkov M.M.</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container_login">
	<div class="col-12">
		<h1>Страничка постов!</h1>
		<?php
				if (!isset($_COOKIE['User'])) {
			?>
		<a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>!
		<?php
				} else {
				// подключение к БД
				$link = mysqli_connect('127.0.0.1', 'root', '44236', 'first_db');
				$sql = "SELECT * FROM posts";
				$res = mysqli_query($link, $sql);
				if (mysqli_num_rows($res) > 0){
					while($post = mysqli_fetch_array($res)){
						echo"<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
					}
				}	else{
						echo "No zapisey!";
					}
				}
			?>
	</div>
</div>
</body>
</html>

