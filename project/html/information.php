<?php
$link = mysqli_connect('db', 'root', 'kali');
if (!$link){
	die('Error' . mysqlierror());
}
echo 'Good';
mysqli_close($link);
?>
