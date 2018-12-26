<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());


$FirstName = mysqli_real_escape_string($link, $_POST['First Name']);
$LastName = mysqli_real_escape_string($link, $_POST['Last Name']);
$FathersName = mysqli_real_escape_string($link, $_POST['Fathers Name']);
$PassportSeries = mysqli_real_escape_string($link, $_POST['Passport Series']);
$PassportNumber = mysqli_real_escape_string($link, $_POST['Passport Number']);
$Adress = mysqli_real_escape_string($link, $_POST['Adress']);
echo $FirstName;
echo $LastName;
echo $FathersName;
echo $PassportSeries;
echo $PassportNumber;
echo $Adress

$SQLquery = "INSERT INTO Patients VALUES ((SELECT IFNULL(max(id)+1,1) from (Select id from Patients) as idPatients), '$FirstName','$LastName', '$FathersName','$PassportSeries', '$PassportNumber', '$Adress')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>New record created successfully";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>