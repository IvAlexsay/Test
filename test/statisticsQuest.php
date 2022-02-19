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
                $topic = filter_var(trim($_POST['choosetopic']),FILTER_SANITIZE_STRING);
                 ?>
                 <h2>Тема: <?=$topic?></h2>
                <table>
                            <colgroup>
                                <col style="background:#4682B4"><!-- С помощью этой конструкции задаем цвет фона для первых двух столбцов таблицы-->
                                <col style="background-color:#6B8E23"><!-- Задаем цвет фона для следующего (одного) столбца таблицы-->
                            </colgroup>
                            <tr>
                                <th style="border-style: solid">Вопрос</th>
                                <th style="border-style: solid">Сложность</th>
                            </tr>
                <?php
                    $mysql = new mysqli('localhost','root','root','teststudents');
                    $topic = filter_var(trim($_POST['choosetopic']),FILTER_SANITIZE_STRING);
                    $id_topic = $mysql->query("SELECT `id_topic` FROM `topic` WHERE `name` LIKE '$topic'");
                    $id_topic = $id_topic->fetch_assoc();
                    $id_topic = $id_topic['id_topic'];
                    $question = $mysql->query("SELECT `id_quest` FROM `questions` WHERE `id_topic` LIKE '$id_topic'");
                    $question = mysqli_fetch_all($question);


                    for ($i=0; $i < count($question); $i++) {
                        $score = $mysql->query("SELECT `score` FROM `answers` WHERE `id_quest` LIKE {$question[$i][0]} AND `checked` LIKE '1'");
                        $score = mysqli_fetch_all($score);
                        if($score == NULL){
                            continue;
                        }
                        $sumscore = 0;
                        foreach ($score as $s){
                          $sumscore += $s[0];
                        }
                        $sumscore = $sumscore / count($score);
                        $descrip = $mysql->query("SELECT `text` FROM `questions` WHERE `id_quest` LIKE {$question[$i][0]}");
                        $descrip = $descrip->fetch_assoc();
                    ?>
                            <tr>
                                <td style="border-style: solid; padding: 5px">  <?= $descrip['text'] ?> </td>
                                <td style="border-style: solid; padding: 5px">  <?= number_format($sumscore, 2) ?> </td>
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
