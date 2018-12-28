<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$SpName = mysqli_real_escape_string($link, $_POST['SpName']);
echo $spName;

$SQLquery = "INSERT INTO Specialisations VALUES ((SELECT IFNULL(max(idSpecializations)+1,1) from (Select idSpecializations from Specialisations) as idSpecializations), '$SpName')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Можно реализовать потом какой нибуль простой виджетик, вывод: Специальность добавлена";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>