<?php


// The database
$db = 'db.txt';

// Variabls from post arrray of registeration form
$username = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$password = $_POST['password'];


//Putting everything together after validationg
$newUser = [];

//Errors if the inputs doesn't validate
$errors = [];

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
  var_dump($password);
 if (isset($password) && $uppercase && $lowercase && $number && strlen($password) > 8 ){
  array_push($newUser,$password);
} else {
  array_push($errors, 'Make sure your password has at least one capital letter, one number, and 8 character long');
}








// Show the user their information and Save the user

if(count($newUser) == 5) {
  echo   "<div><h4>This is you welcome!</h4><ul>" ;
  foreach ($newUser as $new) {
    echo "<li>".$new."</li>";
  }
   echo "</ul></div>";
   saveUser($newUser,$db);
}

// if there is error's there will be shown
if(count($errors) > 0) {
  echo   "<div><h4>Please Check the following and try again</h4><ul>" ;
  foreach ($errors as $error) {
    echo "<li>".$error."</li>";
  }
   echo "</ul></div>" . "<a href='index.php'>try again</a>";
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
*
*/

function checkUserName($username,$db) {
  $open = fopen($db,"r") or exit("Unable to read file!");
  print_r(unserialize(file_get_contents($db)));
}
checkUserName($newUser,$db)

 ?>
