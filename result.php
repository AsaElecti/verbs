<!DOCTYPE html>
<head>
	<title></title>
</head>
<body>
	<span><a href="index.php">HOME</a></span>
	<h1>Result:</h1>
	<br />
	<div>
		<span>
			<?php
				session_start();
				echo "<h1>";
				echo $_SESSION['user'][0];
				echo "</h1>";
				echo "<br/>";
				echo session_id();
				echo "<br />";
				echo session_name();
				$answer1 = $_SESSION['answer1'];
				$answer2 = $_SESSION['answer2'];
				$answer3 = $_SESSION['answer3'];
				$question1 = $_SESSION['question1'];
				$question2 = $_SESSION['question2'];
				$question3 = $_SESSION['question3'];
				session_register_shutdown();
				echo "<br />";
				echo "Right answers: $question1, $question2, $question3.";
				echo "<h3>Your answers: </h3>";
				echo "<br />";				
				echo $answer1;
				echo "<br />";				
				echo $answer2;
				echo "<br />";				
				echo $answer3;
					
			?>		
		</span>
	</div>
	<form action='index.php' method='POST'>
		<input type='submit' name='submit' value='home' />
	</form>
</body>
