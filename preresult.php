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
				$_SESSION['answer3'] = $_POST['answer3'];
				$_SESSION['question3'] = $_POST['question3'];			
			?>		
		</span>
	</div>
	<form action='result.php' method='POST'>
		<input type='submit' name='submit' value='Show my result!' />
	</form>
</body>
