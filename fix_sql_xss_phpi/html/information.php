<?php
$link = mysqli_connect('127.0.0.1', 'root', '44236');
if (!$link){
	die('Error' . mysqlierror());
}
echo 'Good';
mysqli_close($link);
?>
