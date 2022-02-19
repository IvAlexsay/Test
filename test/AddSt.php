<?php
$number_group = filter_var(trim($_POST['choosegroup']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['addname']),FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['addsurname']),FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost','root','root','teststudents');

$mysql->query("INSERT INTO `user` (`id_user`, `name`, `surname`, `number`) VALUES (NULL, '$name', '$surname', '$number_group');");
header('Location: teacher.php');
 ?>
