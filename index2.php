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
	<h1>First file</h1>
	<div style="float:right;">
		<span>
			<?php
				session_start();
				echo "<h2>";
				echo $_SESSION['user'][0];
				echo "</h2>";				
			?>		
		</span>
	</div>
	<br />
		<div>	
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
					$verbsArr[$i] = mysqli_fetch_array($result);
				}
				/*echo "</ br>";
				echo "<pre>";
 				print_r($verbsArr);//убеждаемся, что массив содержит всю БД
				echo "</pre>";*/
	
				$restOfWords[] = array();

				if($verbsArr){
					$currentIndex = mt_rand(0,count($verbsArr));	
				}
				else{
					echo "You are entered correct all of verbs!";
				}
				if(isset($_POST['visibleForm'])){// if set visibleForm - take it to the session, if no - take it to "no"
							$_SESSION['visible'] = $_POST['visibleForm'];
				}elseif(isset($_SESSION['visible'])){
					echo ''; // если переменная видимости в сессии уже существует, то просто ничего не делаем 
				}else{
							$_SESSION['visible'] = "no";
						}				
				?>				
				<form action='index3.php' method='POST'>
				<div>
					<div class='number'>
						<?php print_r($verbsArr[$currentIndex][0]);//Выводит номер строки в массиве
						$_SESSION['currentIndex'] = $verbsArr[$currentIndex][0];//Отправляее № индекса в массиве
						 ?>
					</div>
					<div class='trnsl'>
						<?php print_r($verbsArr[$currentIndex]['trnsl']); ?>
					</div>
					<div class='inf'>
						<?php 
						if($_SESSION['visible'] == "inf"){
							print_r($verbsArr[$currentIndex]['inf']);
							echo "<input type='hidden' name='visible' value='inf' />"; 
						}
						else{
							echo "Infinitive:<br/>";
							echo "<input type='text' name='inf' />";
						}
							?>
					</div>
					<div class='ps'>
						<?php 
						if($_SESSION['visible'] == "ps"){
							print_r($verbsArr[$currentIndex]['ps']); 
							echo "<input type='hidden' name='visible' value='ps' />";
						}
						else{
							echo "Past simple:<br/>";
							echo "<input type='text' name='ps' />";
						}
							?>
					</div>
					<div class='pp'>
						<?php 
						if($_SESSION['visible'] == "pp"){
							print_r($verbsArr[$currentIndex]['pp']);
							echo "<input type='hidden' name='visible' value='pp' />"; 
						}
						else{
							echo "Past participle:<br/>";
							echo "<input type='text' name='pp' />";
						}
							?>
					</div>
					<div class='checkIt'>
						<input type='submit' name='checkIt' value='Check it' />
					</div>
				</div>			
				</form>



				
</body>
