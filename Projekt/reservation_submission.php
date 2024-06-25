<?php
include_once "DBhandle.php";
session_start();
echo '<p>Thank you for reservation'. " " . $_SESSION['first_name'] . " " . $_SESSION['last_name']. '</p>';
echo '<p>Reservation details:'. " " . $_SESSION['date'] . " " . $_SESSION['time'] . " to " . $_SESSION['time_end'] . " party of " . $_SESSION['people_number']. " table:" . $_SESSION['table_id'] .'</p>';
$firstname = $_SESSION['first_name']; $lastname = $_SESSION['last_name'];
$date = $_SESSION['date']; $time = $_SESSION['time']; $timeend = $_SESSION['time_end']; $peoplenumber = $_SESSION['people_number']; $table = $_SESSION['table_id'];
$querry = "INSERT INTO reservations (FirstName, LastName, Date, ResStart, ResEnd, Table_id) VALUES ('$firstname', '$lastname', '$date', '$time', '$timeend', '$table')";
try {
    mysqli_query($mysqli, $querry);
}catch (mysqli_sql_exception){
    echo "Something went wrong";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="res.css" rel="stylesheet">
    <title>Reservation Confirmation</title>
</head>
<body>
<p><a href="Strona1.php">Back to Home</a></p>
</body>
</html>