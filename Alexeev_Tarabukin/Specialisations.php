<html>
 <head>
  <title>Специальности нашей больницы</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Тут хранится информация о специальностях, можно сказать список вакансий для сотрудников больницы: </P>');
	include('config.php');	
	$link = mysqli_connect($server, $user, $password, $database)
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	echo '<P>Succesfully connected!</P>';
	
	$SQLquery = 'SELECT * FROM Specialisations';
	$SQLresult = mysqli_query($link,$SQLquery);
	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<P>Специальность %d: %s </P>',$result[0],$result[1]);
	}
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>

<BR>
<a href="index.html"> <P>GO BACK</P> </a>

 </body>
</html>