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
                <form class="formChooseTest" action="teacherCheckTest.php" method="post">
                  <h2>Выберите номер теста и группу:</h2>
                  <?php
                  $mysql = new mysqli('localhost','root','root','teststudents');
                  $topic = filter_var(trim($_POST['topic']),FILTER_SANITIZE_STRING);
                  $id_topic = $mysql->query("SELECT `id_topic` FROM `topic` WHERE `name` LIKE '$topic'");
                  $id_topic= $id_topic->fetch_assoc();
                   ?>
                  <p>№ Теста:</p>
                  <select class="myselect" type="text" name="numberTest" id="numbetTest">
                    <?php
                    $tests = $mysql->query("SELECT `id_test` FROM `test` WHERE `id_topic` LIKE {$id_topic['id_topic']}");
                    $tests = mysqli_fetch_all($tests);
                    foreach ($tests as $test) {
                      if($check[$test[0]] == $test[0]){
                        continue;
                      }
                      else{
                        $check[$test[0]] = $test[0];
                      }

                    ?>
                      <option><?=$test[0]?></option>
                    <?php
                  }
                  ?>
                </select>
                  <p>№ Группы:</p>
                  <select class="myselect" type="text" name="choosegroup" id="choosegroup">
                    <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $groups = $mysql->query("SELECT `number` FROM `groups`");
                    $groups = mysqli_fetch_all($groups);
                    foreach ($groups as $group) {
                    ?>
                      <option><?=$group[0]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  <br>
                  <button class="mybutton" type="submit">Проверить</button>
                </form>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
