<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());


$FirstName = mysqli_real_escape_string($link, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($link, $_POST['LastName']);
$FathersName = mysqli_real_escape_string($link, $_POST['FathersName']);
$PassportSeries = mysqli_real_escape_string($link, $_POST['PassportSeries']);
$PassportNumber = mysqli_real_escape_string($link, $_POST['PassportNumber']);
$Adress = mysqli_real_escape_string($link, $_POST['Adress']);
echo $FirstName;
echo $LastName;
echo $FathersName;
echo $PassportSeries;
echo $PassportNumber;
echo $Adress;

$SQLquery = "INSERT INTO Patients VALUES ((SELECT IFNULL(max(idPatients)+1,1) from (Select idPatients from Patients) as idPatients), '$FirstName','$LastName', '$FathersName','$PassportSeries', '$PassportNumber', '$Adress')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Можно реализовать потом какой нибуль простой виджетик, вывод: Пациент добавлен";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>