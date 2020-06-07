<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="style-signup.css">
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
        <h1>Sign Up</h1>
        <form action="controleur.php" method="GET">
            <p>Username</p>
            <input type="text" name="userName" placeholder="Enter Username" required>
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <p>Confirm Password</p>
            <input type="password" name="confirmPassword" placeholder="Enter Password" required>
            <input id="submit" type="submit" name="action3" value="Sign Up">
        </form>
    </div>

  
  
</body>
</html>