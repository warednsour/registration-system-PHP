<?php
  session_start();
?>


<?php include('header.php')?>

<?php
//Check if the user logged in
 if(!isset($_SESSION['username'])) { ?>
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
      <input type="text" name="username" value="" placeholder="Имя ползователь">
      <input type="email" name="email" value="" placeholder="электронную почту">
      <input type="number" name="age" value=""placeholder="Возрост">
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
  <?php
  // If the user is logged in
} else {
   ?>
    <div class ="register">
      <h1>List of information about you!</h1>
      <ul>
        <li>username :<?= $_SESSION['username']?></li>
        <li>email :<?= $_SESSION['email']?></li>
        <li>age :<?= $_SESSION['age']?></li>
        <li>sex :<?= $_SESSION['sex']?></li>
      </ul>
      <form action="logout.php">
        <input type="submit" name="logout" value="logout">
      </form>
    </div>
    <?php }
    include('footer.php');
    ?>
