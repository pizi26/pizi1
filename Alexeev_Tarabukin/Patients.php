<html>
 <head>
  <title>Пациенты нашей больницы</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Тут будет инфомация о наших пациентах, вводимые при их регистрации: </P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	
	$SQLquery = 'SELECT * FROM Patients';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Пациент %d:  %s %s %s cерия %d номер %d паспорта, адрес проживания: %s</P>',$result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>