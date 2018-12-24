<html>
 <head>
  <title>Пациенты нашей больницы</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Hello world! THose our patients:</P>');
	// ‘®¥¤¨­ï¥¬áï, ¢ë¡¨à ¥¬ ¡ §ã ¤ ­­ëå VER3
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	echo '<P>Succesfully connected!</P>';
	
	// ‚ë¯®«­ï¥¬ SQL-§ ¯à®á
	$SQLquery = 'SELECT * FROM Patients';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Patient (%d):  %s %s %s cерия %d номер %d паспорта, адрес: %s</P>',$result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6]);
	}
	// Žá¢®¡®¦¤ ¥¬ ¯ ¬ïâì ®â à¥§ã«ìâ â 
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>