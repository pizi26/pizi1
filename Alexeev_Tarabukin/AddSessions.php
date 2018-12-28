<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$specId = mysqli_real_escape_string($link, $_POST['specId']);
$timeStart = mysqli_real_escape_string($link, $_POST['timeStart']);
$timeFinish = mysqli_real_escape_string($link, $_POST['timeFinish']);
$pathId = mysqli_real_escape_string($link, $_POST['pathId']);
$iddiagnosis = mysqli_real_escape_string($link, $_POST['iddiagnosis']);
$lechenie = mysqli_real_escape_string($link, $_POST['lechenie']);
$sledSpec = mysqli_real_escape_string($link, $_POST['sledSpec']);


$SQLquery = "INSERT INTO sessions VALUES ((SELECT IFNULL(max(idsessions)+1,1) from (Select idsessions from sessions) as idsessions),'$specId', '$timeStart','$timeFinish', '$pathId','$iddiagnosis','$lechenie','$sledSpec')";

/* INSERT INTO PatientsDiagnosis VALUES ('$pathId','$iddiagnosis')" - не понял как добавить в две разные таблиц, SQLquery тока с последним insert работает*/

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>Можно реализовать потом какой нибудь простой виджетик, вывод: Работник добавлен";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>