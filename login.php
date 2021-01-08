<?php include('header.php')?>


<?php

$login = $_POST['login'];
$password = $_POST['password'];
$submit = $_POST['submit'];


$db = 'db.txt';
$users = [];


if(isset($submit)){
  if(isset($login)){
    $open = fopen($db,"r") or exit("Unable to read file!");

    //Use buffering techniques to read the file.
    while(!feof($open)) {
      array_push($users,unserialize(fgets($open)));
      }
        for($i = 0 ; $i <= count($users) ; $i++){
        if($users[$i][0] === $login && $users[$i][4] === $password){
          session_start();
          $email = $users[$i][1];
          $age = $users[$i][2];
          $sex = $users[$i][3];
          $_SESSION['username'] = $login;
          $_SESSION['email'] = $email;
          $_SESSION['age'] = $age;
          $_SESSION['sex'] = $sex;
          echo "<div class='register'><h1>the login is correct</h1></div>" ;
          header('Refresh: 2; URL = index.php');
          //close the file
          fclose($open);
          exit;
        }
      }
      echo '<div class="register"><h1>The username or the password is uncorrect please try again</h1></div>' ;
       header('Refresh: 2; URL = index.php');

    }
  }
  ?>
<?php include('footer.php'); ?>
