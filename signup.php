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
  <div>
    <?php
    include_once "libs/maLibSQL.pdo.php";

    if(isset($_POST['action'])) {
      $userName        = $_POST['userName'];
      $email           = $_POST['email'];
      $password        = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];

      $sql = "INSERT INTO users (userName, email, password) VALUES($userName, $email, $password)";
      SQLInsert($sql);
    }
    ?>
  </div>
  <img src="img3.jpg">
  <header>
    <h2></h2>
  </header>
  <div class="playersForm">
  <div class="player1">
    <!-- <img src="avatar.png" class="avatar"> -->
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
            <p>Username</p>
            <input type="text" name="userName" placeholder="Enter Username" required>
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <p>Confirm Password</p>
            <input type="password" name="confirmPassword" placeholder="Enter Password" required>
            <input id="submit" type="submit" name="action" value="Sign Up">
        </form>
    </div>

  
  
</body>
</html>