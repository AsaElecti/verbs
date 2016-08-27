<!DOCTYPE html>
<head>
	<title></title>
</head>
<body>
	<h1>First file</h1>
	<div">
		<span>
			<?php
				session_start();
				$user = $_POST['user'];
				$_SESSION['user']= array($user, "student");
				echo "<h2>";
				echo "Welcome $user!";
				echo "</h2>";
			?>		
		</span>
	</div>
	<br />
	<form action='index2.php' method='POST'>
		<h3>Few more cuestions:</h3>
		<h3><span>Which form of irregular verbs should to be visible?</span></h3><br />
		<input type='radio' name='visibleForm' value='inf' />Infinitive<br />
		<input type='radio' name='visibleForm' value='ps' />Past Simple<br />
		<input type='radio' name='visibleForm' value='pp' />Past Participle<br />
		<input type='radio' name='visibleForm' value='no' checked />No one

		<br />
		<h3><span>What about tips?</span></h3><br />
		<input type='radio' name='tips' value='yes' />Yes)<br />
		<input type='radio' name='tips' value='no' />No!<br />

		<input type='submit' name='submit' value='Go!' />
	</form>
</body>
