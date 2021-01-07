<?php


$username = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$password = $_POST['password'];
$errors = [];

if(!empty($username)){
  if (preg_match('/^[a-zA-Z0-9]+$/', $username) == 0) {
      array_push($errors, 'Please Enter a valid username use only english letters');
  }
} else {
  array_push($errors,'you have to enter username')
}

else if (!empty($email)){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       array_push($errors, 'Please Enter  a valid email form example: example@something.com');
}

} else {
  array_push($errors,'you have to enter email');

}

 else if (!empty($age)){
    if(!is_int($age)) {
      array_push($errors, 'Age can be only numbers');
    } else {
        array_push($errors, 'Please Enter your age');
    }
}
else if (empty($sex)){
      array_push($errors, 'Please Enter your sex');
}
else if (!empty($password)){
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      array_push($errors, 'Make sure your password has at least one capital letter, one number, and 8 character long');
    }
} else {
  array_push($errors, 'Please Enter password ');
}



function saveUser($name, $email, $age, $gender) {


}

<div class="register">
    <h1>Регистрация</h1>
  <form class="" action="register.php" method="post">
    <input type="text" name="username" value="" placeholder="Имя ползователь">
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

 ?>
