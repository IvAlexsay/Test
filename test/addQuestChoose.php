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
                <form class="formChooseTest" action="AddQ.php" method="post">
                  <h2>Выберите тему, в которую желаете добавить вопрос:</h2>
                  <select class="myselect" type="text" name="choosetopic" id="choosetopic">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $name_topic = $mysql->query("SELECT `name` FROM `topic`");
                    $name_topic = mysqli_fetch_all($name_topic);
                    
                    foreach ($name_topic as $topic) {
                    ?>
                      <option><?=$topic[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <h2>Введите вопрос, который желаете добавить:</h2>
                  <input class="myinput" type="text" id="addquest" name="addquest" placeholder="Вопрос" style="width: 100%;">
                  <br>
                  <br>
                  <button class="mybutton" type="submit">Добавить</button>
                </form>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
