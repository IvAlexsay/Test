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
                <form class="formChooseTest" action="AddSt.php" method="post">
                  <h2>Выберите группу, в которую желаете добавить студента:</h2>
                  <select class="myselect" type="text" name="choosegroup" id="choosegroup"  style="width: 15%; margin: auto;">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $name_specs = $mysql->query("SELECT `number` FROM `groups`");
                    $name_specs = mysqli_fetch_all($name_specs);

                    foreach ($name_specs as $spec) {
                    ?>
                      <option><?=$spec[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <h2>Введите имя и фамилию студента, который желаете добавить:</h2>
                  <input class="myinput" type="text" id="addname" name="addname" placeholder="Имя" style="width: 50%; margin: auto;">
                  <br>
                  <br>
                  <input class="myinput" type="text" id="addsurname" name="addsurname" placeholder="Фамилия" style="width: 50%; margin: auto;">
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
