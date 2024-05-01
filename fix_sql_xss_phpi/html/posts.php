<?php
	$link = mysqli_connect('127.0.0.1', 'root', '44236', 'first_db');
	$id = $_GET['id'];
	settype($id, 'integer');
	$sql = "SELECT * FROM posts WHERE id=$id";
	$res = mysqli_query($link, $sql);
	$rows = mysqli_fetch_array($res);
	$title = $rows['title'];
	$main_text = $rows['main_text'];
?>

<!DOCTYPE html>
<html lang="ru" class="posts">
	<head>
		<meta charset="UTF-8">
		<title>Posts Utenkov M.M.</title>
		<link rel="stylesheet" href="css/posts.css">
		<div class="navigation">
			<a href="index.php" class="active">Home</a>
			<img class="logo" src="image/PT_logo.png">
		</div>
	</head>
<body class="body">
	<?php
		echo "<h1 class='name'>$title</h1>";
		echo "<p class='text'>$main_text</p>";
	?>
</body>
</html>
