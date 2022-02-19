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
                <form class="formChooseTest" action="resByDate.php" method="post">
                  <h2>Выберите период, за который хотите увидеть результаты:</h2>
                  <input type="date" class="myinput" name="date1"  id="date1" placeholder="C " style="width: 25%">
                  <br>
                  <br>
                  <input type="date" class="myinput" name="date2"  id="date2" placeholder="По" style="width: 25%">
                  <br>
                  <br>
                  <button class="mybutton" type="submit">Открыть</button>
                </form>
              </div>
      </div>
      </div>
    </div>
  </body>
</html>
