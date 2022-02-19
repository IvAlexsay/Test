<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,inital-sacle=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"/>
    <title>Авторизация</title>
  </head>
  <body>
    <div class="Student">
      <div class="Glass">
          <?php
          if($_COOKIE['user'] == '') :
            ?>
            <div class="StudentAuthorization">
              <div class="StudentBlank">
                <h1>Авторизация</h1>
                <form action="auth.php" method="post">
              <input
                type="text"
                class="form-control"
                name="firstName"
                id="firstName"
                placeholder="Введите имя"
              /><br />
              <input
                type="text"
                class="form-control"
                name="secondName"
                id="secondName"
                placeholder="Введите фамилию"
              /><br />
              <input
                type="text"
                class="form-control"
                name="numberGroup"
                id="numberGroup"
                placeholder="Введите номер группы"
              /><br />
              <button class="mybutton" type="submit">Авторизоваться</button>
            </form>
            </div>
          </div>
      <?php else:?>
        <a href="/exit.php">Здравствуйте <?=$_COOKIE['user']?>. Чтобы выйти нажмите здесь.</a>
      <?php endif;?>
      </div>
    </div>
  </body>
</html>
