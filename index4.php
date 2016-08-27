<!DOCTYPE html>
<head>
	<title></title>
</head>
<body>
	<h1>Third file</h1>
	<div style="float:right;">
		<span>
			<?php
				session_start();
				echo "<h2>";
				echo $_SESSION['user'][0];
				echo "</h2>";
				$_SESSION['answer2'] = $_POST['answer2'];
				$_SESSION['question2'] = $_POST['question2'];
				$a = mt_rand(1,9);
				$b = mt_rand(1,9);
				$question3 = $a + $b;
			?>		
		</span>
	</div>
	<br />
	<form action='preresult.php' method='POST'>
		<h3>Question #3: <br /><?php echo "$a + $b = ?" ?></h3>
		<label>Your answer: <input type="text" name="answer3" autocomplete="off" /></label><br />
		<input type="hidden" name="question3" value="<?php echo $question3; ?>" />
		<input type='submit' name='submit' value='send' />
	</form>
</body>
