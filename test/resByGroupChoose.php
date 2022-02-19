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
                <form class="formChooseTest" action="resByGroup.php" method="post">
                  <h2>Выберите группу, результаты которой желаете просмотреть:</h2>
                  <select class="myselect" type="text" name="choosegroup" id="choosegroup">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $number_groups = $mysql->query("SELECT `number` FROM `groups`");
                    $number_groups = mysqli_fetch_all($number_groups);

                    foreach ($number_groups as $group) {
                    ?>
                      <option><?=$group[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <button class="mybutton" type="submit">Открыть</button>
                </form>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
