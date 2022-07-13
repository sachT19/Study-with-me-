<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href="style.css">
</head>
<body>
<form method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <?php
	require "config.php";
	mysqli_select_db($conn,'quizusers');
	$sql = "select * from questions order by rand() limit 0,5;";
	$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $q = 0;
        while(($row = mysqli_fetch_array($result)) && ($q <= 5)){
				echo "<label>$row[1]</label><br>
				<input type = 'radio' name = '$row[0]' value = '$row[2]' required>
				<label>$row[2]</label>
				<input type = 'radio' name = '$row[0]' value = '$row[2]'>
				<label>$row[3]</label>
				<input type = 'radio' name = '$row[0]' value = '$row[2]'>
				<label>$row[4]</label>
				<input type = 'radio' name = '$row[0]' value = '$row[2]'>
				<label>$row[5]</label>
				<br><br>";
                $q++;
			}
	}
  echo "<input type = 'submit' value = 'I am done' name = 'submit'>";
  echo "</form>";
  //scoring test after submit button is clicked
	$count = 0;
	//echo $_GET['id'];
	if((isset($_POST['submit'])) && ($count < 3)){
		$score = 0;
		$count++;
		for ($i = 1; $i <= 5; $i++){
			$ans = $_POST[$i];
			$cans = $_POST['ans'. $i];
			if ($ans == $cans){
				$score++;
			}
		}
  
	//score results
		$score *= 20;
		if ($score <= 70){
			echo "You did not pass the test.";
		}
			//update query to change values in the table for that user
		$sql = "UPDATE users SET score='$score',count='$count'";
		$result = mysqli_query($conn, $sql);
        $sql = "UPDATE leaderboard SET score = '$score'";
        $result = mysqli_query($conn, $sql);


	}
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
		//selecting data associated with this particular id	 
	while($row = mysqli_fetch_array($result))
	{
		$score = $row['score'];
		$count = $row['count'];
	}

  
  ?>
    </form><br>
    <input type = 'button' value = 'Back to Home' onclick = "location.href ='index.php'">
</body> 
</html>

