<!-- make this like a check-in form. this can display other quiz results -->
<!DOCTYPE html> 
<html>
<head>
    <link rel = "stylesheet" href="style.css">
</head>
<body>
  <!--link to questions: https://www.quizbreaker.com/trivia-questions#general-trivia-questions-->
	<h1>Click one of the buttons to get started!</h1><br>
	<div id = "topleft">
		<h4>Navigation</h4>
		<ul>
			<li>Navigation &rarr; Use this Naviagation box to go through the website, study, and take the quiz!</li>
			<li>Quiz &rarr; We have compiled a list of questions for the quiz. These include general trivia, and they may be challenging. Good luck!</li>
			<li>Study &rarr; Use the Study links below to help you prepare for the quiz. You can listen to calming music and chat with a tutor!</li>
			<li>Leaderboard &rarr; Check the leaderboard to see how you are ranked among others!</li>
		</ul>
	</div>
	<div id = "topright">
		<h4>Quiz</h4>
		<p>Want to test how smart you are? Take our amazing trivia quiz to see how good you are at trivia! You'll have five questions to answer that were chosen randomly. If you score over 70%, you're a certified trivia master! But, if you don't pass the first time, you'll be taken to resources and a place to study to help you get a good grade. You'll only be able to take this quiz a total of three times before it will be locked. You must log in to save quiz results.</p>
		<p>You've taken this quiz -- time(s)!</p>
		<input type = "button" value = "Click Me To Log In!" onclick = "location.href = 'login.php'">
	</div>
	<div id = "bottomleft">
    <h4>Study</h4><br><br>
        <h4><a href = "chatroom.php"><input type = "button" value = "Chat with a tutor!"></a></h4><br>
        <h4><a href = "study.php"><input type = "button" value = "Studying Music!"></a></h4>
	
	
	</div>
	<div id = "bottomright">
        <h4>Leaderboard</h4>
        
	<!--creating leaderboard table-->
    <?php
        require "config.php";
        $sql = "CREATE DATABASE if not exists quizUsers";
	   if ($conn->query($sql) === TRUE) {
		//echo "Database created successfully<br>";
	   } else {
		//echo "Error creating database: " . $conn->error;
	   }
        mysqli_select_db($conn,'quizUsers');
        $sql = 'CREATE TABLE if not exists leaderboard (
	   firstname VARCHAR(30),
	   lastname VARCHAR(30),
	   score FLOAT(2)
	   )';
	   if ($conn->query($sql) === TRUE) {
	       //echo "Table Leaderboard created successfully<br>";
	   } else {
	       //echo "Error creating table: " . $conn->error;
	   }
        //inserting sample user
        $sql = "INSERT INTO leaderboard(firstname, lastname, score) VALUES('Account', 'name', 90)";
        if ($conn->query($sql) === TRUE) {
			//echo "Sample user entered successfully<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
        
        //ordering leaderboard
        $result = mysqli_query($conn, "SELECT firstname, lastname, score FROM leaderboard ORDER BY score DESC"); 
        $rank = 1;
        echo "  <table>
                <tr>
                <th>Rank</th>
                <th>Name</th>
                <th></th>
                <th>Score</th>
                </tr>
        ";
        echo "<style>
        table {
            border-collapse: collapse;
            width: 20%;
            margin-left: 29%;
        }

        td, th {
            border: 3px solid #29A0B1;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color:#29A0B1;
            color: white;
            }
        </style>
        ";
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>{$rank}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['score']}</td></tr>
                ";
                $rank++;
            }
        }
        echo "</table><br>";

        
    ?>
    <input type = "button" value = "Log Out">
    </div>
	
</body>
</html> 
