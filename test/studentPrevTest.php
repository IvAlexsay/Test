<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Для студента</title>
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
          <div class="studentTestBlank">
            <?php
            $mysql = new mysqli('localhost','root','root','teststudents');
            $user = $_COOKIE['user'];
            $id_user = $_COOKIE['id_user'];

            $id_res = filter_var(trim($_POST['choosetest']),FILTER_SANITIZE_STRING);
            

                $idbuf_res = $id_res;
                //print_r(count($id_res));
                $answers = $mysql->query("SELECT `answer` FROM `answers` WHERE `id_res` LIKE '$idbuf_res'");
                $answers = mysqli_fetch_all($answers);
                //print_r($answers);
                $id_quest = $mysql->query("SELECT `id_quest` FROM `answers` WHERE `id_res` LIKE '$idbuf_res'");
                $id_quest = mysqli_fetch_all($id_quest);
                ?>
                <h1>Тест id_<?=$id_res?></h1><br>
                <?php
                //print_r($id_quest);
                for ($k=0; $k < count($id_quest); $k++) {
                    $idbuf_quest = $id_quest[$k][0];
                    //print_r($id_quest[$k][0]);
                    $descrip[$k] = $mysql->query("SELECT `text` FROM `questions` WHERE `id_quest` LIKE '$idbuf_quest'");
                    $descrip[$k] = mysqli_fetch_all($descrip[$k]);
            ?>
            <div class="formulation" style="width: 700px">
                <div class="qtext" >
                    <p>Вопрос <?=$k + 1;?>. <br> <?=$descrip[$k][0][0]?> <br>
                    <label for="q2117928:3_answer" class="accesshide"></label>
                    <br>
                    <input class = "myinput" type="text" id="answer<?=$i?>" name="answer<?=$i?>" size="6" class="form-control d-inline" readonly="readonly" style="margin-left: 0px" placeholder="<?=$answers[$k][0]?>"></p>
                </div>
            </div>
            <?php
                   //print_r($id_user);
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
