<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$Passport = mysqli_real_escape_string($link, $_POST['Passport']);
$FirstName = mysqli_real_escape_string($link, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($link, $_POST['LastName']);
$FathersName = mysqli_real_escape_string($link, $_POST['FathersName']);
$ScienceDegree = mysqli_real_escape_string($link, $_POST['ScienceDegree']);

$SQLquery = "INSERT INTO Workers VALUES ('$Passport', '$FirstName','$LastName', '$FathersName','$ScienceDegree')";

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Можно реализовать потом какой нибудь простой виджетик, вывод: Работник добавлен";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>