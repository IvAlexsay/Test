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
                <form class="formChooseTest" action="AddT.php" method="post">
                  <h2>Выберите предмет, в который желаете добавить тему:</h2>
                  <select class="myselect" type="text" name="choosesubject" id="choosesubject">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $name_subjects = $mysql->query("SELECT `name` FROM `subject`");
                    $name_subjects = mysqli_fetch_all($name_subjects);

                    foreach ($name_subjects as $subject) {
                    ?>
                      <option><?=$subject[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <h2>Введите тему, которую желаете добавить:</h2>
                  <input class="myinput" type="text" id="addtopic" name="addtopic" placeholder="Название темы" style="width: 100%;">
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
