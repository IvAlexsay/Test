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
              <a href="teacher.php">Домой</a>
            </div>
          </header>
        </header>
        <div class="StudentMain">
              <div class="StudentChooseTest">
                <form action="GetScore.php" method="post">
                <?php
                $mysql = new mysqli('localhost','root','root','teststudents');
                $number_group = filter_var(trim($_POST['choosegroup']),FILTER_SANITIZE_STRING);
                $id_group = $mysql->query("SELECT `id_group` FROM `groups` WHERE `number` LIKE '$number_group'");
                $id_group = $id_group->fetch_assoc();
                $id_test = filter_var(trim($_POST['numberTest']),FILTER_SANITIZE_STRING);
                $id_users = $mysql->query("SELECT `id_user` FROM `user` WHERE `number` LIKE '$number_group'");
                $id_users = mysqli_fetch_all($id_users);
                $_SESSION['id_group'] = $id_group;
                $_SESSION['group'] = $number_group;
                $_SESSION['id_test'] = $id_test;
                $l = 0;
                for ($i=0; $i < count($id_users) ; $i++) {
                  ?><div class="TeacherCheckForm">
                    <div class="GlassT"><?php
                    $name_stud = $mysql->query("SELECT `name` FROM `user` WHERE `id_user` LIKE {$id_users[$i][0]}");
                    $name_stud = $name_stud->fetch_assoc();
                    $sname_stud = $mysql->query("SELECT `surname` FROM `user` WHERE `id_user` LIKE {$id_users[$i][0]}");
                    $sname_stud = $sname_stud->fetch_assoc();

                    $id_res = $mysql->query("SELECT `id_res` FROM `result` WHERE `id_user` LIKE {$id_users[$i][0]} AND `id_test` LIKE '$id_test' AND `checked` LIKE '0'");
                    $id_res = mysqli_fetch_all($id_res);
                    if(count($id_res) == 0){
                        continue;
                    }
                    /*$rescheck = $mysql->query("SELECT `result` FROM `result` WHERE `id_res` LIKE {$id_res[0][0]}");
                    $rescheck = $rescheck->fetch_assoc();
                    if($rescheck['result'] != 0){
                        continue;
                    }*/

                    $_SESSION['id_res'.$l] = $id_res;

                    $date = $mysql->query("SELECT `date` FROM `result` WHERE `id_user` LIKE {$id_users[$i][0]} AND `id_test` LIKE '$id_test'");
                    if($date){
                        $date = $date->fetch_assoc();
                    }

                //for ($i=0; $i < count($id_res); $i++) {
                    $idbuf_res = $id_res[0][0];
                    //print_r(count($id_res));
                    $answers = $mysql->query("SELECT `answer` FROM `answers` WHERE `id_res` LIKE '$idbuf_res'");
                    $answers = mysqli_fetch_all($answers);
                    //print_r($answers);
                    $id_quest = $mysql->query("SELECT `id_quest` FROM `answers` WHERE `id_res` LIKE '$idbuf_res'");
                    $id_quest = mysqli_fetch_all($id_quest);
                    ?>
                    <br>
                    <p><?=$name_stud['name']?> <?=$sname_stud['surname']?></p>
                    <p><?=$date['date']?></p>
                    <?php
                    //print_r($id_quest);
                    for ($k=0; $k < count($id_quest); $k++) {
                        $idbuf_quest = $id_quest[$k][0];
                        //print_r($id_quest[$k][0]);
                        $descrip[$k] = $mysql->query("SELECT `text` FROM `questions` WHERE `id_quest` LIKE '$idbuf_quest'");
                        $descrip[$k] = mysqli_fetch_all($descrip[$k]);
                        //print_r($descrip[$k][0][0]);
                ?>
                <div class="formulation" style="width: 700px">
                    <div class="qtext" >
                        <p>Вопрос <?=$k + 1;?>. <br> <?=$descrip[$k][0][0]?> <br>
                        <label for="q2117928:3_answer" class="accesshide"></label>
                        <br>
                        <input class = "myinput" type="text" id="answer<?=$i?>" name="answer<?=$i?>" size="6" readonly="readonly" style="margin-left: 0px" placeholder="<?=$answers[$k][0]?>"></p>
                    </div>
                </div>
                <br>
                <?php
                    }
                    ?>
                    <input class = "myinput" type="text" id="res1<?=$l?>" name="res1<?=$l?>" size="6" placeholder="Оценка на вопрос 1">
                    <input class = "myinput" type="text" id="res2<?=$l?>" name="res2<?=$l?>" size="6" placeholder="Оценка на вопрос 2">
                    <p style="text-align:center">Опоздание<input type="checkbox" name="delay<?=$l?>" id="delay<?=$l?>"></p>
                    <?php
                    $l = $l + 1;
                    ?></div>
                  </div><?php
            }
                $_SESSION['count'] = $l;
                if($l == 0){
                    ?>
                        <h2>Непроверенные тесты отсутствуют</h2>
                <?php
                }
                else{
                ?>
                <br>
                <button class="mybutton" type ="submit">Готово</button>
                <?php
                }
                ?>
                </form>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
