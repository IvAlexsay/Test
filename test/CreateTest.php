<?php
    @ob_start();
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
          <header class="HeaderSection">

          </header>
        </header>
        <div class="StudentMain">
            <div class="studentTestBlank">
              <?php
              $user = $_COOKIE['user'];
              $id_user = $_COOKIE['id_user'];
              $group = $_COOKIE['number'];
              $theme = filter_var(trim($_POST['choosetopic']),FILTER_SANITIZE_STRING);
              $count = filter_var(trim($_POST['count_q']),FILTER_SANITIZE_STRING);
              $is_check = filter_var(trim($_POST['is_check']),FILTER_SANITIZE_STRING);
               ?>
              <h1>Тест по теме: <?=$theme?></h1>
              <?php
              $mysql = new mysqli('localhost','root','root','teststudents');
              $id_theme = $mysql->query("SELECT `id_topic` FROM `topic` WHERE `name` LIKE '$theme'"); // по теме нахожу id_theme
              $id_theme = $id_theme->fetch_assoc();

              $numTest = $mysql->query("SELECT `id_test` FROM `result` WHERE `id_user` LIKE '$id_user' AND `id_topic` LIKE {$id_theme['id_topic']}");
              $numTest = mysqli_fetch_all($numTest);

              $id_tests = $mysql->query("SELECT `id_test` FROM `test` WHERE `id_topic` LIKE {$id_theme['id_topic']}");
              $id_tests = mysqli_fetch_all($id_tests);

              $_SESSION['count'] = $count;

              if($numTest == NULL){
                if($id_tests != NULL){
                  $id_test = min($id_tests[0]);
                }
                else{
                  $id_test = 1;
                }
              }
              else {
                  $id_test = max($numTest)[0] + 1;
              }
              $date_now = date("H:i:s");

              $was = 0;

              if(!$is_check){

                  if($id_test <= max($id_tests)[0]){
                      $id_questNEW = $mysql->query("SELECT `id_quest` FROM `test` WHERE `id_test` LIKE '$id_test' AND `id_topic` LIKE {$id_theme['id_topic']}");
                      $id_questNEW = mysqli_fetch_all($id_questNEW);
                      for ($i=0; $i < $count; $i++) {
                          $id_q = $id_questNEW[$i][0];
                          $descrip[$i] = $mysql->query("SELECT `text` FROM `questions` WHERE `id_quest` LIKE '$id_q'");
                          $descrip[$i] = mysqli_fetch_all($descrip[$i]);
                          ?>
                          <form action="answers.php" method="post">
                          <div class="formulation"style="width: 700px">
                              <div class="qtext" >
                                  <p>Вопрос <?=$i + 1;?>. <br> <?= $descrip[$i][0][0] ?> <br>
                                  <label for="q2117928:3_answer" class="accesshide"></label>
                                  <br>
                                  <input class="myinput" type="text" id="answer<?=$i?>" name="answer<?=$i?>" size="6" placeholder="Ответ"></p>
                              </div>
                          </div>
                          <?php
                          //$date = date("Y-m-d H:i:s");
                          //$mysql->query("INSERT INTO `test` ( `id_test`, `id_quest`, `id_topic`, `date`) VALUES ('$id_test', '$id_q', {$id_theme['id_topic']},'$date')");
                          $_SESSION['id_quest'.$i] = $id_q;
                      }
                      $was = 1;
                  }
              }

              $id_quets = $mysql->query("SELECT `id_quest` FROM `questions` WHERE `id_topic` LIKE {$id_theme['id_topic']} AND `remove` LIKE '0'");
              $id_quets = mysqli_fetch_all($id_quets);

              /*$descrip = $mysql->query("SELECT `text` FROM `questions` WHERE `id_topic` LIKE {$id_theme['id_topic']} AND `remove` LIKE '0'");// по id_theme нахожу описание вопроса
              $descrip = mysqli_fetch_all($descrip);*/

              if($is_check) {//or (max($potential_idtest)[0] >= max($max_idtest)[0])
              for ($i=0; $i < count($id_quets) ; $i++) {
                  $r[$i] = $id_quets[$i][0];
              }
              shuffle($r);

              for ($i=0; $i < $count; $i++) {
                  //$j = $r[$i];
                  $descrip = $mysql->query("SELECT `text` FROM `questions` WHERE `id_quest` LIKE {$r[$i]}");// по id_theme нахожу описание вопроса
                  $descrip = $descrip->fetch_assoc();
              ?>
              <form action="answers.php" method="post">
              <div class="formulation" style="width: 700px">
                  <div class="qtext" >
                      <p>Вопрос <?=$i + 1;?>. <br> <?= $descrip['text'] ?> <br>
                      <label for="q2117928:3_answer" class="accesshide"></label>
                      <br>
                      <input class="myinput" type="text" id="answer<?=$i?>" name="answer<?=$i?>" size="6" placeholder="Ответ"></p>
                  </div>
              </div>
              <?php
                  /*$text_que = $descrip[$j][0];
                  $id_quest = $mysql->query("SELECT `id_quest` FROM `questions` WHERE `text` LIKE '$text_que'"); // по вопросу нахожу id
                  $id_quest = $id_quest->fetch_assoc();*/
                  $date = date("Y-m-d H:i:s");
                  $mysql->query("INSERT INTO `test` ( `id_test`, `id_quest`, `id_topic`, `date`) VALUES ('$id_test', {$r[$i]},
                      {$id_theme['id_topic']},'$date')");
                  $_SESSION['id_quest'.$i] = $r[$i];
                  }
                  $was = 1;
              }
              if($was == 1){
                  $date = date("Y-m-d H:i:s");
                  $mysql->query("INSERT INTO `result` ( `id_user`, `id_test`, `id_topic`, `result`, `delay`, `checked`, `date`)
                         VALUES ('$id_user', '$id_test', {$id_theme['id_topic']}, '0', '0', '0', '$date')");
                  $id_res =  $mysql->query("SELECT `id_res` FROM `result` WHERE `id_user` LIKE '$id_user' AND `id_test` LIKE '$id_test' AND `id_topic` LIKE {$id_theme['id_topic']}");
                  $id_res = $id_res->fetch_assoc();
                  $_SESSION['id_res'] = $id_res['id_res'];
              ?>
              <br><button class="mybutton" type="submit">Закончить</button>
            <?php
            }
            else{
              ?> <h1>Все тесты пройдены</h1> <?php
            } ?>
            </form>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
