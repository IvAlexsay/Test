<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Для преподавателя</title>
    <link rel="icon" type="image" href="images/preview.jpg">
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
        <div class="TeacherMain">
          <div class="TeacherButtons">
            <form class="TeacherFrom" action="resByGroupChoose.php">
              <button class="mybutton" type="submit">Результаты по группе</button>
            </form>
            <form class="TeacherFrom" action="resByDateChoose.php">
              <button class="mybutton" type="submit">Результаты по дате</button>
            </form>
            <form class="TeacherFrom" action="statisticsQuestChoose.php">
              <button class="mybutton" type="submit">Статистика вопросов</button>
            </form>
            <form class="TeacherFrom" action="teacherChooseTest.php">
              <button class="mybutton" type="submit">Оценить тест</button>
            </form>
            <form class="TeacherFrom" action="addStudentChoose.php">
              <button class="mybutton" type="submit">Добавить студента</button>
            </form>
            <form class="TeacherFrom" action="addSubjectChoose.php">
              <button class="mybutton" type="submit">Добавить предмет</button>
            </form>
            <form class="TeacherFrom" action="addTopicChoose.php">
              <button class="mybutton" type="submit">Добавить тему</button>
            </form>
            <br>
            <br>
            <form class="TeacherFrom" action="addQuestChoose.php">
              <button class="mybutton" type="submit">Добавить вопрос</button>
            </form>
            <br>
            <br>
            <form class="TeacherFrom" action="deleteQuestChoose.php">
              <button class="mybutton" type="submit">Удалить вопрос</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
