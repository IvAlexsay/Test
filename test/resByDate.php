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
            <?php
                $mysql = new mysqli('localhost','root','root','teststudents');
                $date1 = filter_var(trim($_POST['date1']),FILTER_SANITIZE_STRING);
                $date2 = filter_var(trim($_POST['date2']),FILTER_SANITIZE_STRING);

                $id_res = $mysql->query("SELECT `id_res` FROM `result` WHERE (`date` BETWEEN '$date1' AND '$date2')");
                $id_res = mysqli_fetch_all($id_res);

                ?>
                    <table>
                            <colgroup>
                                <col span="3" style="background:#4682B4"><!-- С помощью этой конструкции задаем цвет фона для первых двух столбцов таблицы-->
                                <col style="background-color:#6B8E23"><!-- Задаем цвет фона для следующего (одного) столбца таблицы-->
                                <col style="background-color:#FFD700">
                            </colgroup>
                        <tr>
                            <th style="border-style: solid">Студент</th>
                            <th style="border-style: solid">Номер теста</th>
                            <th style="border-style: solid">Результат</th>
                            <th style="border-style: solid">Дата</th>
                            <th style="border-style: solid">Проверка</th>
                        </tr>
                <?php
                for ($i=0; $i < count($id_res); $i++) {


                    $id_test = $mysql->query("SELECT `id_test` FROM `result` WHERE `id_res` LIKE {$id_res[$i][0]}");
                    $id_test = $id_test->fetch_assoc();

                    $id_user = $mysql->query("SELECT `id_user` FROM `result` WHERE `id_res` LIKE {$id_res[$i][0]}");
                    $id_user = $id_user->fetch_assoc();

                    $result = $mysql->query("SELECT `result` FROM `result` WHERE `id_res` LIKE {$id_res[$i][0]}");
                    $result = $result->fetch_assoc();

                    $date = $mysql->query("SELECT `date` FROM `result` WHERE `id_res` LIKE {$id_res[$i][0]}");
                    $date = $date->fetch_assoc();

                    $checked = $mysql->query("SELECT `checked` FROM `result` WHERE `id_res` LIKE {$id_res[$i][0]}");
                    $checked = $checked->fetch_assoc();

                    $username = $mysql->query("SELECT `name` FROM `user` WHERE `id_user` LIKE {$id_user['id_user']}");
                    $username = $username->fetch_assoc();
                    $usersname = $mysql->query("SELECT `surname` FROM `user` WHERE `id_user` LIKE {$id_user['id_user']}");
                    $usersname = $usersname->fetch_assoc();
                    ?>
                        <tr>
                            <td style="border-style: solid; padding: 5px">  <?= $username['name'] ?> <?=$usersname['surname']?></td>
                            <td style="border-style: solid; padding: 5px">  <?= $id_test['id_test'] ?> </td>
                            <td style="border-style: solid; padding: 5px">  <?= $result['result'] ?> </td>
                            <td style="border-style: solid; padding: 5px">  <?= $date['date'] ?> </td>
                            <?php if($checked['checked'] == 1):?>
                            <td style="border-style: solid; padding: 5px"> Да </td>
                            <?php else:?>
                            <td style="border-style: solid; padding: 5px"> Нет </td>
                            <?php endif;?>
                        </tr>
                    <?php
                }
            ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
