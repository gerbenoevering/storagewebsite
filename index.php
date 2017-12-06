<?php
include_once 'databaseconnection.php';
session_start();
if(isset($_POST['email'])) {
  if(isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = Database::getDb()->prepare("SELECT * FROM users WHERE email = ?");
    $result->execute([$email]);
    $result = $result->fetch(PDO::FETCH_OBJ);
    if(empty($result)) {
      header("Location: /index.php");
    } else {
    }
    $verify = password_verify($password, $result->password);
    if($verify == false) {
      header("Location: /storagewebsite/index.php");
    } else {
      $_SESSION['userlogin'] = true;
      header("Location: /storagewebsite/homepage.php");
      exit();
    }
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Personal Storage</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
  </head>
  <body>
    <div class="mainlogin">
      <h1>Personal Storage</h1>
      <form method="post" class="login1" >
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Password">
        <div class="buttons">
          <button class="loginbutton" type="submit" name="button">Login</button>
          <a href="register.php"><button class="registerbutton" type="button" name="button">Register</button></a>
        </div>
      </form>
    </div>
  </body>
</html>
