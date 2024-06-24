<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="reservation_submission.php" method="post">
    <?php create_tables() ?>
<button type="submit" name="confirm_reservation">submit</button>
</form>
</body>
</html>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['table_number'])){

        $_SESSION['table_number'] = $_POST['table_number'];
        $people_number = $_SESSION['people_number'];
        $res_start = $_SESSION['time'];
        $res_end = add_time($res_start, 3);
        $_SESSION['time_end'] = add_time($res_start, 3);
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " " . "Party of {$_SESSION['people_number']}" . " " . "Date: " . $_SESSION['date'] . " " . $_SESSION['time'] . "-" . $res_end . "\n";
        header("Location: reservation_submission.php");
        exit();
}}

function create_tables()
{
    session_start();
    $people_number = $_SESSION['people_number'];
    $availableTables = [];
    $unavailableTables = [];
    if ($people_number <= 4) {
        $availableTables = [2, 4, 6, 8];
        $unavailableTables = [1, 3, 5, 7, 9];
    } elseif ($people_number <= 6) {
        $availableTables = [1, 3, 5, 7, 9];
        $unavailableTables = [2, 4, 6, 8];
    }
    for ($i = 1; $i <= 9; $i++) {
        $available = in_array($i, $availableTables);
        $class = $available ? 'available' : 'unavailable';
        $disabled = $available ? '' : 'disabled';
        $color = $available ? 'green' : 'red';
        echo '<input type="radio" id="table' . $i . '" name="table_number" value="' . $i . '" ' . $disabled . '>';
        echo '<label style="background-color:" ' . $color . ' for="table' . $i . '" class="' . $class . '">Table ' . $i . '</label><br>';
    }
}
function add_time($time, $hour) : string
{
    list($hours, $minutes) = explode(":", $time);
    $hours = intval($hours);
    $hours_end = $hours + $hour;
    return "$hours_end" . ":" . "$minutes";
}
?>
