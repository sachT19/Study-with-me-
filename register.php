<!DOCTYPE html> 
<html>
<head>
<link rel = "stylesheet" href="style.css">
</head>
<body>
<h1>Register an account with us here!</h1>
<?php 
require 'config.php';
if(isset($_POST['submit'])){
	// when button is clicked, a database and table is created
	$sql = "CREATE DATABASE if not exists quizUsers";
	if ($conn->query($sql) === TRUE) {
		//echo "Database created successfully";
	} else {
		//echo "Error creating database: " . $conn->error;
	}
	
	// creating table columns here
	mysqli_select_db($conn,'quizUsers');
	$sql = "CREATE TABLE if not exists Users (
	firstname VARCHAR(30),
	lastname VARCHAR(30),
	email VARCHAR(50) NOT NULL,
	username VARCHAR(15) NOT NULL UNIQUE,
	password VARCHAR(50), 
	score FLOAT(2),
	count INT(1),
	UNIQUE KEY (firstname, lastname)
	);";
	if ($conn->query($sql) === TRUE) {
	  //echo "Table Users created successfully";
	} else {
	  //echo "Error creating table: " . $conn->error;
	}
    $sql = "INSERT INTO Users('Account', '1', 'account@gmail.com', 'acc1', 'password', 90, 1)";
    if ($conn->query($sql) === TRUE) {
			//echo "New user registered successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
    

	// form questions become variables that will populate the database 
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pass1 = md5($_POST['pass1']);
	$pass2 = md5($_POST['pass2']);
	//username unique key? 
	$sql = "SELECT username FROM USERS where username = '$user'"; 
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) >  0) {
		echo "This user exists. Please choose another username.";
	}else{
		$sql = "INSERT INTO Users (firstname, lastname, email, username, password, score, count)
		VALUES('$fname', '$lname', '$email', '$user', '$pass1', 0, 0)";
		if ($conn->query($sql) === TRUE) {
			//echo "New user registered successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
        $sql = "INSERT INTO leaderboard(firstname, lastname, score)";
        if ($conn->query($sql) === TRUE) {
			//echo "New user registered successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
?>

<script>
function matchPassword(){  
	var pw1 = document.getElementById('pass').value;  
	var pw2 = document.getElementById('cpass').value;  
	if (pw1 != pw2) {   
		alert('Passwords did not match')  
	}
}
</script>
<div id = "box">
<!-- self submitting a simple html form -->
<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <label>First name:</label>
    <input type = "text" name = "fname"><br>
    <label>Last name:</label>
    <input type = "text" name = "lname"><br>
    <label>Email:</label>
    <input type = "email" name = "email"><br>
    <label>Username:</label>
    <input type = "text" name = "user"><br>
    <label>Password:</label>
    <input type = "password" name = "pass1" id = "pass"><br>
    <label>Confirm Password:</label>
    <input type = "password" name = "pass2" id = "cpass"><br>
    <input type = "submit" value = "All Done!" name = "submit" onclick = "matchPassword()">
</form>
<br>
<input type = 'button' value = 'Back to Login' onclick = "location.href ='login.php'">
</div>
</body>
</html>