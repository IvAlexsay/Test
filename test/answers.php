<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Тест для студента</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="Student">
      <div class="Glass">
        <header class="StudentHeader">
          <header class="HeaderSection">
            <div class="HeaderButton">
              <a href="student.php">Домой</a>
            </div>
          </header>
        </header>
        <div class="StudentMain">
          <div class="StudentBlank">
          <?php
          $mysql = new mysqli('localhost','root','root','teststudents');
          $count = $_SESSION['count'];
          $id_res = $_SESSION['id_res'];
              for ($i=0; $i < $count; $i++) {
              $answer = filter_var(trim($_POST['answer'.$i]),FILTER_SANITIZE_STRING);
              $id_quest = $_SESSION['id_quest'.$i];
              $mysql->query("INSERT INTO `answers` ( `id_quest`, `answer`, `id_res`, `score`, `checked`) VALUES ('$id_quest', '$answer', '$id_res', '0', '0')");
          }
          ?>
          <h1>Ваши ответы приняты</h1>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
