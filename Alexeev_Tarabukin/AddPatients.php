<?php
include('config.php');	
$link = mysqli_connect($server, $user, $password, $database)
	or die('Error: Unable to connect: ' . mysqli_connect_error());


$First_name = mysqli_real_escape_string($link, $_POST['First name']);
$Last_name = mysqli_real_escape_string($link, $_POST['Last name']);
echo $FirstName;
echo $LastName;
echo $PassportSeries;
echo $PassportNumber;
echo $Adress

$SQLquery = "INSERT INTO Patients VALUES ((SELECT IFNULL(max(id)+1,1) from (Select id from Patients) as idPatients), '$FirstName','$LastName', '$PassportSeries', '$PassportNumber', '$Adress')";
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