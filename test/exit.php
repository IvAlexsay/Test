<?php

setcookie('user', $user['name'], time() - 3600, "/");
setcookie('number', $user['number'], time() - 3600, "/");
setcookie('id_user', $user['id_user'], time() - 3600, "/");
header('Location: student.php');
?>
