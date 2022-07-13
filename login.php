<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href="style.css">
</head>
<body>
	<h1>Welcome to our quiz!</h1>
  <br>
  <div id = "box">
    <br>
    <h4>Existing user? Log in here!</h4>
    <br>
    <form method = "POST"> 
      <label>Username:</label>
      <input type="text" name = "user">
      <br>
      <label>Password:</label>
      <input type="password" name = "pass">
      <br><br>
      <input type="submit" name = "sub" id = "button">
    </form>
    <br>
    <h4>First time? Click this button to make an account!</h4>
    <a href="register.php">
      <br>
      <input type="button" value = "Register" id = "button">
     </a>
  </div>

<?php 
require 'config.php'; 
if(isset($_POST['sub'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	mysqli_select_db($conn,'quizUsers');
	$sql = "SELECT username, password FROM Users";
	$result = mysqli_query($conn, $sql);
    $inCount = 0;
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)){
		if (($row[0] == $user) && ($row[1] == md5($pass))){
			echo "<br><a href='quiz.php?id=$row[0]'><input type = 'button' value = 'Take the Quiz!'></a>";
            $checkIncorrect = NULL;
		}else{
			$checkIncorrect = "Username or Password is incorrect. Please try again";
            $inCount++;
		}
		}
        if (($checkIncorrect != NULL) && ($inCount > 0)){
            echo $checkIncorrect;
        }
	}
}
?>
</body>
</html>