<?php
$firstName = filter_var(trim($_POST['firstName']), FILTER_SANITIZE_STRING);
$secondName = filter_var(trim($_POST['secondName']), FILTER_SANITIZE_STRING);
$numberGroup = filter_var(trim($_POST['numberGroup']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'teststudents');

$result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$firstName' AND `surname` = '$secondName' AND `number` = '$numberGroup'");
$user = $result->fetch_assoc();
if (count((array)$user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");
setcookie('number', $user['number'], time() + 3600, "/");
setcookie('id_user', $user['id_user'], time() + 3600, "/");
$mysql->close();

header('Location: student.php');
?>
