<?php
$subject = filter_var(trim($_POST['choosesubject']),FILTER_SANITIZE_STRING);
$name_topic= filter_var(trim($_POST['addtopic']),FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost','root','root','teststudents');
$id_subject = $mysql->query("SELECT `id_subject` FROM `subject` WHERE `name` LIKE '$subject'");
$id_subject = $id_subject->fetch_assoc();
$id_subject = $id_subject['id_subject'];
$mysql->query("INSERT INTO `topic` (`id_topic`, `name`, `id_subject`) VALUES (NULL, '$name_topic', '$id_subject');");
header('Location: teacher.php');
 ?>
