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
            <a href="exit.php">Здравствуйте <?=$_COOKIE['user']?>, чтобы выйти нажмите здесь.</a>
          <?php endif;?>
          </header>
        </header>
        <div class="StudentMain">
          <div class="StudentButtons">
            <form action="studentTest.php">
              <button class="mybutton" type="submit">Пройти тест</button>
            </form>
            <form action="studentPrevTestChoose.php">
              <button class="mybutton" type="submit">Прошлые тесты</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
