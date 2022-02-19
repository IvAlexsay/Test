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
                <h1>Выберите тему, по которой желаете пройти тест:</h1>

                <form class="formChooseTest" action="CreateTest.php" method="post">
                  <h2>Тема:</h2>
                  <select class="myselect" type="text" name="choosetopic" id="choosetopic">
                    <?php
                    $name_subj = filter_var(trim($_POST['choosesubj']),FILTER_SANITIZE_STRING);
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $id_subj = $mysql->query("SELECT `id_subject` FROM `subject` WHERE `name` LIKE '$name_subj'");
                    $id_subj = $id_subj->fetch_assoc();

                    $name_topic = $mysql->query("SELECT `name` FROM `topic` WHERE `id_subject` LIKE {$id_subj['id_subject']}");
                    $name_topic = mysqli_fetch_all($name_topic);
                    foreach ($name_topic as $topic) {
                    ?>
                      <option><?=$topic[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <input type="text" class="myinput" name="count_q"  id="count_q" placeholder="Введите количество вопросов">
                  <p style="text-align:center">Индивидуальный тест<input type="checkbox" name="is_check" id="is_check"></p>
                  <button class="mybutton" type="submit">Создать тест</button>
                </form>
              </div>
            <?php endif;?>
      </div>
      </div>
    </div>
  </body>
</html>
