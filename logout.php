<?php include('header.php')?>
<?php
    session_start();
    session_unset();
   session_destroy();
   echo "<div class='register'><h1>You have been logged out Come back soon we will wait for you!</h1></div>";
   echo "<h1>Оценка 5?</h1>";
   header('Refresh: 3; URL = index.php');
?>
<?php include('footer.php'); ?>
