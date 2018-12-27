<html>
 <head>
  <title>Сеансы в нашей больницы</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>ТУТ БУДУТ ХРАНИТЬСЯ ВСЕ ВСЕ СЕАНСЫ, допустим если пациент посетит трех врачей за день, то тут будут все его 3 сеанса по отдельности:</P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	echo '<P>Succesfully connected!</P>';
	
	'''$SQLquery = 'SELECT * FROM sessions';'''
	$SQLquery = 'SELECT sessions.idsessions, (PassportSP from Specialists inner join sessions on sessions.Specialists_idSpecialists = Specialists.idSpecialist), sessions.timeStart, sessions.timeFinish, sessions.Patients_idPatients, sessions.diagnosis_iddiagnosis, sessions.lechenie';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Сеанс %d у специалиста(%d) c %s до %s пациента(%d) с диагнозом %d  Назначено лечение: %s </P>',$result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>