<?php
$topic = filter_var(trim($_POST['choosetopic']),FILTER_SANITIZE_STRING);
$text_q = filter_var(trim($_POST['addquest']),FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost','root','root','teststudents');
$id_topic = $mysql->query("SELECT `id_topic` FROM `topic` WHERE `name` LIKE '$topic'");
$id_topic = $id_topic->fetch_assoc();
$id_topic = $id_topic['id_topic'];
$mysql->query("INSERT INTO `questions` (`id_quest`, `text`, `id_topic`, `remove`) VALUES (NULL, '$text_q', '$id_topic', '0');");
header('Location: teacher.php');
 ?>
