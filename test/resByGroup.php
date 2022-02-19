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
                $number_group = filter_var(trim($_POST['choosegroup']),FILTER_SANITIZE_STRING);

                /*$id_group = $mysql->query("SELECT `id_group` FROM `groups` WHERE `number` LIKE '$subject'");
                $id_group = $id_group->fetch_assoc();
                $id_group = $id_group['id_group'];*/

                $id_users = $mysql->query("SELECT `id_user` FROM `user` WHERE `number` LIKE '$number_group'");
                $id_users = mysqli_fetch_all($id_users);

                ?><h2>Группа №<?=$number_group?></h2><?php


                for ($i=0; $i < count($id_users) ; $i++) {
                    $username = $mysql->query("SELECT `name` FROM `user` WHERE `id_user` LIKE {$id_users[$i][0]}");
                    $username = $username->fetch_assoc();
                    $usersname = $mysql->query("SELECT `surname` FROM `user` WHERE `id_user` LIKE {$id_users[$i][0]}");
                    $usersname = $usersname->fetch_assoc();
                    ?>
                        <h3><?=$username['name']?> <?=$usersname['surname']?></h3>
                        <table>
                            <colgroup>
                                <col span="2" style="background:#4682B4"><!-- С помощью этой конструкции задаем цвет фона для первых двух столбцов таблицы-->
                                <col style="background-color:#FFD700"><!-- Задаем цвет фона для следующего (одного) столбца таблицы-->
                            </colgroup>
                        <tr>
                            <th style="border-style: solid">№ теста</th>
                            <th style="border-style: solid">Результат</th>
                            <th style="border-style: solid">Проверка</th>
                            <!--<th style="border-style: solid">Опоздание</th>-->
                        </tr>
                    <?php
                    $id_res = $mysql->query("SELECT `id_res` FROM `result` WHERE `id_user` LIKE {$id_users[$i][0]}");
                    $id_res = mysqli_fetch_all($id_res);

                    for($j = 0; $j < count($id_res); $j++){
                        $idTest =  $mysql->query("SELECT `id_test` FROM `result` WHERE `id_res` LIKE {$id_res[$j][0]}");
                        $idTest = $idTest->fetch_assoc();

                        $result = $mysql->query("SELECT `result` FROM `result` WHERE `id_res` LIKE {$id_res[$j][0]}");
                        $result = $result->fetch_assoc();

                        $checked = $mysql->query("SELECT `checked` FROM `result` WHERE `id_res` LIKE {$id_res[$j][0]}");
                        $checked = $checked->fetch_assoc();
                        ?>
                        <tr>
                            <td style="border-style: solid; padding: 5px">  <?= $idTest['id_test'] ?> </td>
                            <td style="border-style: solid; padding: 5px">  <?= $result['result'] ?> </td>
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
                    <br>
                    <?php
                }

                 ?>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
