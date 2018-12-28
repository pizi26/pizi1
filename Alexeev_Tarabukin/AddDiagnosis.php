<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$nameDia = mysqli_real_escape_string($link, $_POST['nameDia']);
echo $nameDia;

$SQLquery = "INSERT INTO diagnosis VALUES ((SELECT IFNULL(max(iddiagnosis)+1,1) from (Select iddiagnosis from diagnosis) as iddiagnosis), '$nameDia')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Можно реализовать потом какой нибуль простой виджетик, вывод: Диагноз добавлен";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>