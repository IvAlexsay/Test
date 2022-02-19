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
                <form class="formChooseTest" action="teacherChooseTestMore.php" method="post">
                  <h2>Выберите тему:</h2>
                  <p>Тема:</p>
                  <select class="myselect" type="text" name="topic" id="topic">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $topics = $mysql->query("SELECT `name` FROM `topic`");
                    $topics = mysqli_fetch_all($topics);
                    foreach ($topics as $topic) {
                    ?>
                      <option><?=$topic[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <button class="mybutton" type="submit">Выбрать номер теста и группу</button>
                </form>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
