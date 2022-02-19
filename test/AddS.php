<?php
$spec = filter_var(trim($_POST['choosespec']),FILTER_SANITIZE_STRING);
$name_subject = filter_var(trim($_POST['addsubject']),FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost','root','root','teststudents');
$id_spec = $mysql->query("SELECT `id_special` FROM `specialty` WHERE `name` LIKE '$spec'");
$id_spec = $id_spec->fetch_assoc();
$id_spec = $id_spec['id_special'];
$mysql->query("INSERT INTO `subject` (`id_subject`, `name`, `id_special`) VALUES (NULL, '$name_subject', '$id_spec');");
header('Location: teacher.php');
 ?>
