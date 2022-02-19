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
            <?php
              if($_COOKIE['user'] == '') :
            ?>
              <div class="StudentChooseTest">
                <h1>Чтобы пройти тест, авторизуйтесь</h1>
              </div>
            <?php else:?>
              <div class="StudentChooseTest">
                <h1>Выберите предмет, по которому желаете пройти тест:</h1>
                <form class="formChooseTest" action="studentChooseTopic.php" method="post">
                  <h2>Предмет:</h2>
                  <select class="myselect" type="text" name="choosesubj">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $id_spec = $mysql->query("SELECT `id_special` FROM `groups` WHERE `number` LIKE {$_COOKIE['number']}");
                    $id_spec = $id_spec->fetch_assoc();

                    $name_subj = $mysql->query("SELECT `name` FROM `subject` WHERE `id_special` LIKE {$id_spec['id_special']}");
                    $name_subj = mysqli_fetch_all($name_subj);  //$subj->fetch_assoc();
                    foreach ($name_subj as $subname) {
                    ?>
                      <option><?=$subname[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br />
                  <button class="mybutton" type="submit">Выбрать тему</button>
                </form>
              </div>
            <?php endif;?>
      </div>
      </div>
    </div>
  </body>
</html>
