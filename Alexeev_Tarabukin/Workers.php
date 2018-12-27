<html>
 <head>
  <title>Работники</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Работники нашей больницы:</P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	echo '<P>Succesfully connected!</P>';
	
	$SQLquery = 'SELECT * FROM Workers';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Работник %d: %s %s %s стаж работы - %d </P>',$result[0],$result[1],$result[2],$result[3],$result[4]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>