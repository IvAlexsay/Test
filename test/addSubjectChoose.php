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
                <form class="formChooseTest" action="AddS.php" method="post">
                  <h2>Выберите направление, которому желаете добавить предмет:</h2>
                  <select class="myselect" type="text" name="choosespec" id="choosespec">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $name_specs = $mysql->query("SELECT `name` FROM `specialty`");
                    $name_specs = mysqli_fetch_all($name_specs);

                    foreach ($name_specs as $spec) {
                    ?>
                      <option><?=$spec[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <h2>Введите предмет, который желаете добавить:</h2>
                  <input class="myinput" type="text" id="addsubject" name="addsubject" placeholder="Предмет" style="width: 100%;">
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
