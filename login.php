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
    <h2></h2>
  </header>
  <div class="playersForm">
  <div class="player1">
        <h1>Player1</h1>
        <form action="controleur.php" method="GET">
            <p>Username</p>
            <input type="text" name="userName" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="passe" placeholder="Enter Password" required>
            <h1>Player2</h1>
            <p>Username</p>
            <input type="text" name="userName2" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="passe2" placeholder="Enter Password" required>
            <input id="submit" type="submit" name="action" value="Login">
            <div id="link">
              <a href="signup.php">Don't have an account?</a>  
            </div>
            
        </form>
    </div>

  
  
</body>
</html>