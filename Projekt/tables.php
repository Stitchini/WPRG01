<?php
session_start();

function create_tables(): void {
    $people_number = $_SESSION['people_number'];
    $availableTables = [];
    if ($people_number <= 4) {
        $availableTables = [2, 4, 6, 8];
    } elseif ($people_number <= 6) {
        $availableTables = [1, 3, 5, 7, 9];
    }
    for ($i = 1; $i <= 9; $i++) {
        $available = in_array($i, $availableTables);
        $disabled = $available ? '' : 'disabled';
        $color = $available ? 'green' : 'red';
        echo '<input type="radio" id="table' . $i . '" name="table_number" value="' . $i . '" ' . $disabled . '>';
        echo '<label style="background-color:' . $color . '" for="table' . $i . '">Table ' . $i . '</label><br>';
    }
}
function add_time($time, $hour) : string {
    list($hours, $minutes) = explode(":", $time);
    $hours = intval($hours);
    $hours_end = $hours + $hour;
    return str_pad($hours_end, 2, '0', STR_PAD_LEFT) . ":" . $minutes;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['table_number'])) {
    $_SESSION['table_number'] = $_POST['table_number'];
    $res_start = $_SESSION['time'];
    $_SESSION['time_end'] = add_time($res_start, 3);
    header("Location: reservation_submission.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table Selection</title>
</head>
<body>
<form method="post">
    <?php create_tables(); ?>
    <button type="submit" name="confirm_reservation">Submit</button>
</form>
</body>
</html>