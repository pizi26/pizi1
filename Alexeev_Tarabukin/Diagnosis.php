<html>
 <head>
  <title>Диагнозы</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Тут будет библиотека всех существующих в мире диагнозов, чтобы врач вводил и сразу мог прикреплять к карте пациента:(в идеале этой таблицы не будет на сайте, только в базе данных, но в данном этапе разработки решили выставить на показ все таблицы бд)</P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	
	$SQLquery = 'SELECT * FROM diagnosis';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Диагноз %d:  %s </P>',$result[0],$result[1]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>