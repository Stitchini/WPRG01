<?php
session_start();
echo '<p>Thank you for reservation'. " " . $_SESSION['first_name'] . " " . $_SESSION['last_name']. '</p>';
echo '<p>Reservation details:'. " " . $_SESSION['date'] . " " . $_SESSION['time'] . " to " . $_SESSION['time_end'] . " party of " . $_SESSION['people_number']. '</p>';
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