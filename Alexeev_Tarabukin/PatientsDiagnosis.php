<html>
 <head>
  <title>Диагнозы пациентов нашей больницы</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Связь пациент-диагноз(чтобы потом использовать в карте пациента),
		в идеале этой таблицы не будет на сайте, только в базе данных, но в данном этапе разработки решили выставить на показ все таблицы бд, тут инфа не вводится а автоматически сохранятся после сеанса</P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	echo '<P>Succesfully connected!</P>';
	
	$SQLquery = 'SELECT * FROM PatientsDiagnosis';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>У пациента %d -  диагноз %d </P>',$result[0],$result[1]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>