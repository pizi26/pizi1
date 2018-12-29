<html>
 <head>
  <title>Расписание врачей</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Расписание врачей:</P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	
	$SQLquery = 'SELECT Specialisations.SpName, Workers.First_Name, Workers.Last_Name, Workers.Fathers_Name, ConsultingRooms.idCab from Specialists inner join Workers on Workers.Passport=Specialists.PassportSP inner join Specialisations on Specialisations.idSpecializations=Specialists.idSpecializationsSP inner join ConsultingRooms on ConsultingRooms.idCab=Specialists.idCabSP';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>%s %s %s %s работает в кабинете №%d </P>',$result[0],$result[1],$result[2],$result[3],$result[4]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>