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
	
	$SQLquery = 'SELECT sessions.idsessions, Workers.First_Name, Workers.Last_Name, Workers.Fathers_Name, sessions.timeStart, sessions.timeFinish, Patients.First_Name, Patients.Last_Name, Patients.Fathers_Name, diagnosis.nameDia, sessions.lechenie from sessions inner join Specialists on Specialists.idSpecialist=sessions.Specialists_idSpecialists inner join Workers on Workers.Passport=Specialists.PassportSP inner join Patients on Patients.idPatients=sessions.Specialists_idSpecialists inner join diagnosis on diagnosis.iddiagnosis=sessions.diagnosis_iddiagnosis';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Сеанс %d у специалиста %s %s %s c %s до %s пациента %s %s %s с диагнозом %s  Назначено лечение: %s </P>',$result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>