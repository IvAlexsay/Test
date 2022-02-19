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
                <h2>Выберите вопрос, который желаете удалить:</h2>
                <?php
                $mysql = new mysqli('localhost','root','root','teststudents');
                $name_topic = filter_var(trim($_POST['choosetopic']),FILTER_SANITIZE_STRING);
                ?>
                <form class="formChooseTest" action="DeleteQ.php" method="post">
                  <h2>Вопрос:</h2>
                  <select class="myselect" type="text" name="chooseq" id="chooseq">
                    <?php

                    $id_topic = $mysql->query("SELECT `id_topic` FROM `topic` WHERE `name` LIKE '$name_topic'");
                    $id_topic = $id_topic->fetch_assoc();
                    $text_q = $mysql->query("SELECT `text` FROM `questions` WHERE `id_topic` LIKE {$id_topic['id_topic']}");
                    $text_q = mysqli_fetch_all($text_q);
                    foreach ($text_q as $text) {
                    ?>
                      <option><?=$text[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <button class="mybutton" type="submit">Удалить</button>
                </form>
              </div>

      </div>
      </div>
    </div>
  </body>
</html>
