<?php
  include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
  include_once "libs/modele.php";
  
  if (isset($_GET['action'])) {
    $userName        = $_GET['userName'];
    $password        = $_GET['email'];
    $userName2        = $_GET['userName2'];
    $password2        = $_GET['email2'];

    if(verifUserBdd($userName,$password)) {
      if(verifUserBdd($userName2, $password2)) {
        header("location: main/index.html");
      }

    }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="style-login.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
</head>
<body>
  <img src="img3.jpg">
  <header>
    <h2>Match The Cards</h2>
  </header>
  <div class="playersForm">
  <div class="player1">
    <!-- <img src="avatar.png" class="avatar"> -->
        <h1>Player 1</h1>
        <form action="login.php" method="GET">
            <p>Username</p>
            <input type="text" name="login" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="passe" placeholder="Enter Password">
            <!-- <input type="submit" name="" value="Login"> -->
        </form>
    </div>

  <div class="player2">
    <!-- <img src="avatar.png" class="avatar"> -->
        <h1>Player 2</h1>
        <form action="login.php" method="GET">
            <p>Username</p>
            <input type="text" name="login2" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="passe2" placeholder="Enter Password">
            <!-- <input type="submit" name="" value="Login"> -->
        </form>
    </div>
  </div>
  <div class="button">
  <input id="submit" type="button" value="Submit" name="action">
  <br>
  <a href="signup.php">Don't have an account?</a>
  </div>
</body>
</html>