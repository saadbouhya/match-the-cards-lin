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
        <form action="controleur.php" method="GET" id="form1">
            <p>Username</p>
            <input type="text" name="login" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="passe" placeholder="Enter Password">
            <div class="button">
            <input id="submit" type="submit" name="action" value="Login1">
            </div>
        </form>
    </div>

  <div class="player2">
    <!-- <img src="avatar.png" class="avatar"> -->
        <h1>Player 2</h1>
        <form action="controleur.php" method="GET" id="form2">
            <p>Username</p>
            <input type="text" name="login2" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="passe2" placeholder="Enter Password">
            <div class="button">
            <input  id="submit" type="submit" name="action2" value="Login2">
            </div>
        </form>
    </div>
  </div> 
  <div class="button">
  <br>
  <a href="signup.php">Don't have an account?</a>
  </div>
</body>
</html>