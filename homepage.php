<?php
session_start();
if(isset($_SESSION['userlogin'])) {
  if($_SESSION['userlogin'] == false) {
    header("Location: /index.php");
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
    <header>
      <div class="container">
        <nav class="navbar">
          <h1>Personal Storage</h1>
          <div class="logoutbutton">
              <a class="logoutbutton1" href="http://gerbenoevering.duckdns.org/storagewebsite/logout.php">logout</a>
          </div>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="videos.php">Videos</a></li>
            <li><a href="images.php">Images</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="content">
      <div class="welcometext">
        <h2>Hi there!</h2>
        <p>Welcome to your personal storage website<br />Login or Register up to get started</p>
      </div>
      <div class="aboutme">
        <h2>About me:</h2>
        <p>My name is Gerben Oevering, 16 years old <br />I study software development at the Friese Poort<br/>In my spare time i am doing lots of programming</p>
      </div>
      <div class="contact">
        <h2>Contact:</h2>
        <p>Email: gerbenoevering@gmail.com<br />Phone number: +31 6 11223344</p>
      </div>
      <div id="toggleMenu" onclick="toggleMenu()"></div>
      <div class="loginbar" id="menu">
        <div class="uploadbutton">
          <h2>Upload files</h2>
          <button type="submit" name="submit">Upload</button>
          <input type="file" name="uploadfile">
        </div>
        <div class="deletebutton">
          <h2>Delete files</h2>
          <button type="submit" name="submit">Delete</button>
          <input type="file" name="uploadfile">
        </div>
      </div>
    </div>
    <footer>
      <div class="footer1">
        <p>© Gerben Oevering 2017</p>
      </div>
    </footer>
    <script>
      var toggleStatus = 1;
      function toggleMenu() {
        if (toggleStatus == 1) {
          document.getElementById("menu").style.left = "-250px";
          toggleStatus = 0;
        } else if (toggleStatus == 0) {
            document.getElementById("menu").style.left = "0px";
            toggleStatus = 1;
        }
      }
    </script>
  </body>
</html>
