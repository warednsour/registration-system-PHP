<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title></title>
  </head>
  <body>


      <!-- Form for login -->
    <div class="register">
      <h1>Логин</h1>
    <form class="" action="login.php" method="post">
      <input type="text" name="login" value=""placeholder="Логин" required>
      <label for="login">
        <i class="fas fa-user"></i>
      </label>
      <input type="password" name="password" value="" placeholder="Пароль" required>
      <label for="password">
					<i class="fas fa-lock"></i>
				</label>
      <input type="submit" name="submit" value="вход">
    </form>
  </div>

  <!-- Form for registeration -->

  <div class="register">
      <h1>Регистрация</h1>
    <form class="" action="register.php" method="post">
      <input type="text" name="login" value="" placeholder="Имя ползователь">
      <input type="email" name="email" value="" placeholder="электронную почту">
      <input type="text" name="age" value=""placeholder="Возрост">
      <div class="ward">
      <input type="radio" id="male" name="sex" value="male">
      <i class="fas fa-male" > Male</i>
      <input type="radio" id="female" name="sex" value="female">
      <i class="fas fa-female"> Female</i>
    </div>
      <input type="password" name="password" value="" placeholder="Пароль">
      <input type="submit" name="submit" value="Регистрация">
    </form>
    </div>
  </body>
</html>
