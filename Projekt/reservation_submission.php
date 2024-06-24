<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_reservation"])) {
    session_start();
    $date = $_SESSION['date'];
    $time = $_SESSION['time'];
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $peopleNumber = $_SESSION['people_number'];
    $tableNumber = $_SESSION['table_number'];
    $timeend = $_SESSION['time_end'];
    var_dump($_SESSION);
    // In a future implementation, here you would insert the reservation into the database

    // Display a confirmation message
    echo '<p>Thank you for reserving, ' . $firstName . ' ' . $lastName . '.</p>';
    echo '<p>Reservation details: ' . $date . ' at ' . $time . '-' .  $timeend .' for table ' . $tableNumber . ' for ' . $peopleNumber . ' people.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Confirmation</title>
    <style>
        @font-face {font-family: Gothic_821_condensed_btt; src: url("gothic_821_condensed_bt.ttf")}
        body {
            font-family: Gothic_821_condensed_btt;
            margin: 20px;
            padding: 20px;
            max-width: 600px;
        }
        p {
            font-size: 26px;
        }
    </style>
</head>
<body>
<p><a href="Strona1.php">Make another reservation</a></p>
</body>
</html>
