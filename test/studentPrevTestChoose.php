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
          <header class="HeaderSection">
            <?php
            if($_COOKIE['user'] == '') :
              ?>
            <div class="HeaderButton">
              <a href="auindex.php">Войти</a>
            </div>
          <?php else:?>
            <a href="/exit.php">Здравствуйте <?=$_COOKIE['user']?>, чтобы выйти нажмите здесь.</a>
          <?php endif;?>
          </header>
        </header>
        <div class="StudentMain">
          <div class="StudentChooseTest">
            <?php
            $mysql = new mysqli('localhost','root','root','teststudents');
            $user = $_COOKIE['user'];
            $id_user = $_COOKIE['id_user'];

            $id_res = $mysql->query("SELECT `id_res` FROM `result` WHERE `id_user` LIKE '$id_user'");
            $id_res = mysqli_fetch_all($id_res);
            ?>
            <h2>Выберите id_теста:</h2>
                <form class="formChooseTest" action="studentPrevTest.php" method="post">
                  <h2>id_№</h2>
                  <select class="myselect" type="text" name="choosetest" id="choosetest">
                    <?php
                    foreach ($id_res as $id) {
                    ?>
                      <option><?=$id[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <button class="mybutton" type="submit">Показать тест</button>
                </form>
                <?php
                //print_r($id_quest);
                /*for ($k=0; $k < count($id_quest); $k++) {
                    $idbuf_quest = $id_quest[$k][0];
                    //print_r($id_quest[$k][0]);
                    $descrip[$k] = $mysql->query("SELECT `text` FROM `questions` WHERE `id_quest` LIKE '$idbuf_quest'");
                    $descrip[$k] = mysqli_fetch_all($descrip[$k]);
                    //print_r($descrip[$k][0][0]);
            ?>
            <div class="formulation" style="width: 700px">
                <div class="qtext" >
                    <p>Вопрос <?=$i + 1;?>. <br> <?= $descrip[$i][0][0] ?> <br>
                    <label for="q2117928:3_answer" class="accesshide"></label>
                    <br>
                    <input class = "myinput" type="text" id="answer<?=$i?>" name="answer<?=$i?>" size="6" class="form-control d-inline" readonly="readonly" style="margin-left: 0px" placeholder="<?=$answers[$k][0]?>"></p>
                </div>
            </div>
            <?php
                   //print_r($id_user);
                }*/
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
