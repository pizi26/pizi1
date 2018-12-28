<html>
 <head>
  <title>Карта пациента</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	
	$SQLquery = 'SELECT * FROM PatientsCard';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Карта пациента №%d</P>',$result[0]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>