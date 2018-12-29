<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$NUMcab = mysqli_real_escape_string($link, $_POST['NUMcab']);
$StartWork = mysqli_real_escape_string($link, $_POST['StartWork']);
$EndWork = mysqli_real_escape_string($link, $_POST['EndWork']);

$SQLquery = "INSERT INTO ConsultingRooms VALUES ((SELECT IFNULL(max(idCab)+1,1) from (Select idCab from ConsultingRooms) as idCab), '$NUMcab','$StartWork','$EndWork')";

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Можно реализовать потом какой нибудь простой виджетик, вывод: Кабинет добавлен";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>