<?php include('header.php')?>
<?php


// The database
$db = 'db.txt';

// Variabls from post arrray of registeration form
$username = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$password = $_POST['password'];
$submit = $_POST['submit'];

//Putting everything together after validationg
$newUser = [];

//Errors if the inputs doesn't validate
$errors = [];

//If the user got here from the  form or another way - for security
if(isset($submit)) {
  if(!checkUserName($username,$db)){
    echo "<div class='register'><h1>there is a user with this name please try another name</h1><a href='index.php'>try again</a></div>";

  }

  // Check if it's empty or not and validate or not
  if(isset($username) && preg_match('/^[a-zA-Z0-9]+$/', $username)){
    array_push($newUser,$username);
  } else {
    array_push($errors, 'Please Enter a valid username use only english letters');
  }

   if (isset($email)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($newUser,$email);
       }
  } else {
    array_push($errors, 'Please Enter  a valid email form example: example@something.com');
  }

    if (isset($age) && is_Numeric($age)){
        array_push($newUser,$age);
    } else {
       array_push($errors, 'Age can be only numbers');
       array_push($errors, 'Please Enter your age');
      }


   if (isset($sex)){
      array_push($newUser,$sex);
  } else {
      array_push($errors, 'Please Enter your sex');
  }

    //Validate Password

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

   if (isset($password) && $uppercase && $lowercase && $number && strlen($password) > 8 ){
    array_push($newUser,$password);
  } else {
    array_push($errors, 'Make sure your password has at least one capital letter, one number, and 8 character long');
  }
} else {
  header('location: index.php');
}

// Save the user if all the information is correct!
if(count($newUser) == 5) {
  echo   "<div class='register'><h1>Thank you for registering!</h1>
  <h5>Please wait we will redirect you</h5></div>" ;
  saveUser($newUser,$db);
  header('Refresh: 2; URL = index.php');
}

// if there is error's there will be shown
if(count($errors) > 0) {
  echo   "<div class='register'><h4>Please Check the following and try again</h4><ul>" ;
  foreach ($errors as $error) {
    echo "<li>".$error."</li>";
  }
   echo "</ul><a href='index.php'>try again</a></div>";
}

/*
* saveUser($user,$db)
*
* $user array
*$db string.txt
*
*/


function saveUser($user,$db){

// Open the db.txt
$open = fopen($db,"a+") or exit("Unable to open file!");

//Add the User
fwrite($open,serialize($user));

//add a newline
$numberNewline = "\n";
fwrite($open, $numberNewline);

//close the file
fclose($open);

}


/*
* check if the username (login) is one
* must return False this means that there is a username with this name
*/

function checkUserName($username,$db) {

  $users = [];
  $open = fopen($db,"r") or exit("Unable to read file!");

  //Use buffering techniques to read the file.
  while(!feof($open)) {
    array_push($users,unserialize(fgets($open)));
    }
  for($i = 0 ; $i <= count($users) ; $i++){
    foreach ($users as $user => $value) {
        if($username == $value[$i]) {
        return false;
        }
      }
    }
    return true;
  }

 ?>
<?php include('footer.php'); ?>
