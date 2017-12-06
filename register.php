<?php
include_once 'databaseconnection.php';
if(!empty($_POST['firstname'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  if($password1 == $password2) {
    $passwordtostore = password_hash($password1, PASSWORD_BCRYPT);
    $q = Database::getDb()->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?,?,?,?,?)");
    $q->execute([$firstname, $lastname, $username, $email, $passwordtostore]);
    header("Location: /storagewebsite/index.php");
    exit();
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
    <div class="mainregister">
      <h1>Register</h1>
      <form method="post" class="register1" >
        <input type="text" name="firstname" placeholder="First name">
        <input type="text" name="lastname" placeholder="Last name">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email adres">
        <input type="password" name="password1" placeholder="Password">
        <input type="password" name="password2" placeholder="Confirm password">
        <button type="submit" name="submit">Register</button>
      </form>
    </div>
  </body>
</html>
