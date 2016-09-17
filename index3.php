<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
	<title></title>
<style type="text/css">
	.number,
	.inf,
	.pp,
	.ps,
	.trnsl,
	.checkIt{
	display:inline-block;
	border: 2px solid green;
	padding: 10px;
	margin: 10px;
		}

</style>  
</head>
<body>
	<span><a href="index.php">HOME</a></span>
	<h1>Second file</h1>
	<div style="float:right;">
		<span>
			<?php
				session_start();
				echo "<h2>";
				echo $_SESSION['user'][0];
			?>		
		</span>
	</div>
	<?php 
				$host='localhost'; // имя хоста (уточняется у провайдера)
				$database='verbs'; // имя базы данных, которую вы должны создать
				$user='root'; // заданное вами имя пользователя, либо определенное провайдером
				$pswd=''; // заданный вами пароль
 
				$connection = mysqli_connect($host, $user, $pswd, $database);
				mysqli_set_charset($connection, "utf8");
				if(mysqli_connect_errno()){
					echo "Failed to connect to MySQL: ".mysqli_connect_error();
				}

				$query = "SELECT*FROM verbs;";
				$result = mysqli_query($connection, $query);
				$count = mysqli_num_rows($result);//посчитали количество строк в БД
				echo $count;
				$verbsArr[] = array();
				for($i=0; $i<$count; $i++){
					$verlbsArr[$i] = mysqli_fetch_array($result);
				}
				/*echo "</ br>";
				echo "<pre>";
 				print_r($verbsArr);//убеждаемся, что массив содержит всю БД
				echo "</pre>";*/						
				?>				

				<form action='index3.php' method='POST'>
				<div>
					<div class='number'>
						<?php 
						$currentIndex = $_SESSION['currentIndex'];
						echo $currentIndex;//Выводит номер строки в массиве ?>
					</div>
					<div class='trnsl'>
						<?php print_r($verbsArr[$currentIndex-1]['trnsl']); ?>
					</div>
					<div class='inf'>
						<?php 
						if($_SESSION['visible']=='inf'){
							print_r($verbsArr[$currentIndex-1]['inf']);
							$correctAnswerInf = $verbsArr[$currentIndex-1]['inf'];
							echo "<input type='hidden' name='inf' value='$correctAnswerInf' />"; 
						}elseif($_POST['inf']!=$verbsArr[$currentIndex-1]['inf']){
							echo "Infinitive<br/>";
							echo "<input type='text' name='inf' style='border:2px solid red;' />";
						}else{
							print_r($verbsArr[$currentIndex-1]['inf']);
							$correctAnswerInf = $verbsArr[$currentIndex-1]['inf'];//Если ответ дан правильно - передаем его методом POST во всех последующих итерациях
							echo "<input type='hidden' name='inf' value='$correctAnswerInf' />";
						}
						?>
					</div>
					<div class='ps'>
						<?php 
						if($_SESSION['visible']=='ps'){
							print_r($verbsArr[$currentIndex-1]['ps']);
							$correctAnswerPs = $verbsArr[$currentIndex-1]['ps'];
							echo "<input type='hidden' name='ps' value='$correctAnswerPs' />"; 
						}elseif($_POST['ps']!= $verbsArr[$currentIndex-1]['ps']){
							echo "Past Simple<br/>";
							echo "<input type='text' name='ps' style='border:2px solid red;' />";
						}else{
							print_r($verbsArr[$currentIndex-1]['ps']);
							$correctAnswerPs = $verbsArr[$currentIndex-1]['ps'];//Если ответ дан правильно - передаем его методом POST во всех последующих итерациях
							echo "<input type='hidden' name='ps' value='$correctAnswerPs' />";
						}
							?>
					</div>
					<div class='pp'>
						<?php 
						if($_SESSION['visible']=='pp'){
							print_r($verbsArr[$currentIndex-1]['pp']);
							$correctAnswerPp = $verbsArr[$currentIndex-1]['pp'];
							echo "<input type='hidden' name='pp' value='$correctAnswerPp' />"; 
						}elseif($_POST['pp'] != $verbsArr[$currentIndex-1]['pp']){
							echo "Past Participle<br/>";
							echo "<input type='text' name='pp' style='border:2px solid red;' />";
						}else{
							print_r($verbsArr[$currentIndex-1]['pp']);
							$correctAnswerPp = $verbsArr[$currentIndex-1]['pp'];//Если ответ дан правильно - передаем его методом POST во всех последующих итерациях
							echo "<input type='hidden' name='pp' value='$correctAnswerPp' />";
						}
							?>
					</div>
					
					<?php
					// если все введенные ответы верны кнопка "Проверить" меняется на "Продолжить"
						if((isset($correctAnswerInf))&&(isset($correctAnswerPs))&&(isset($correctAnswerPp))){
							// добавить номер пройденного элемента в сессию
							echo "<div class='checkIt'>
							<a href = 'index2.php'>Continue</a>
							</div>";
						}else{
							echo "<div class='checkIt'>
							<input type='submit' name='checkIt' value='Check it' />
							</div>";
						}
					 ?>
	
</body>
