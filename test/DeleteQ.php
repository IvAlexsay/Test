<?php
$text_q = filter_var(trim($_POST['chooseq']),FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost','root','root','teststudents');
$id_quest = $mysql->query("SELECT `id_quest` FROM `questions` WHERE `text` LIKE '$text_q'");
$id_quest = $id_quest->fetch_assoc();
$mysql->query("UPDATE `questions` SET `remove` = '1' WHERE `id_quest` LIKE {$id_quest['id_quest']}");
header('Location: teacher.php');
 ?>
