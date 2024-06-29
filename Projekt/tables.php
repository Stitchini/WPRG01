<?php
session_start();
function create_tables(): void {
    mysqli_report(MYSQLI_REPORT_OFF);
    $dbhost = 'localhost';
    $dbuser = 'Szymon';
    $dbpass = 'mojehaslo';
    $dbname = 'reservations';
    try {
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    }catch (mysqli_sql_exception) {
        echo "Could not connect";
    }
    $date = $_SESSION['date']; $time_start = $_SESSION['time_start']; $time_end = $_SESSION['time_end'];
    $people_number = intval($_SESSION['people_number']);
    $_SESSION['table_seats'] = [1=>4, 2=>6, 3=>4, 4=>2,5=>4, 6=>2, 7=>4, 8=>6, 9=>4];
    $availableTables = [];
    do{
    foreach ($_SESSION['table_seats'] as $id => $seats){
        $sql1 = "SELECT * FROM `reservations` WHERE Date = '$date' AND Table_id = '$id' AND '$time_start' BETWEEN ResStart AND ResEnd;";
        $sql2 = "SELECT * FROM `reservations` WHERE Date = '$date' AND Table_id = '$id' AND '$time_end' BETWEEN ResStart AND ResEnd;";
        if ($people_number <= 2){
            if ($seats <= 2){
                $result1 = mysqli_query($mysqli, $sql1);
                $result2 = mysqli_query($mysqli, $sql2);
                if (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0){
                    array_push($availableTables, $id);
                }
            }
        }
        elseif ($people_number > 2 && $people_number <=4){
            if ($seats > 2 && $seats <= 4){
                $result1 = mysqli_query($mysqli, $sql1);
                $result2 = mysqli_query($mysqli, $sql2);
                if (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0){
                    array_push($availableTables, $id);
                }
            }
        }
        elseif ($people_number > 4){
            if ($seats > 4){
                $result1 = mysqli_query($mysqli, $sql1);
                $result2 = mysqli_query($mysqli, $sql2);
                if (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0){
                    array_push($availableTables, $id);
                }
            }
        }
    }

    if ($people_number > 6){
        echo "Sorry no tables are available<br>";
        echo '<p><a href="Strona1.php">Back to Home</a></p>';
        break;
    }
    $people_number = $people_number + 2;
    }while (empty($availableTables));
//    if ($people_number <= 4) {
//        $availableTables = [2, 4, 6, 8];
//    } elseif ($people_number <= 6) {
//        $availableTables = [1, 3, 5, 7, 9];
//    }
    foreach ($_SESSION['table_seats'] as $id => $seats) {
        $available = in_array($id, $availableTables);
        $disabled = $available ? '' : 'disabled';
        $color = $available ? '#5FE4A1' : '#E45F5F';
        echo '<input type="radio" id="table' . $id . '" name="table_number" value="' . $id . '" ' . $disabled . '>';
        echo '<label style="background-color:' . $color . '" for="table' . $id . '">Table ' . $id . ' Seats: ' . $seats .'</label><br>';
    }
}
function add_time($time, $hour) : string {
    list($hours, $minutes) = explode(":", $time);
    $hours = intval($hours);
    $hours_end = $hours + $hour;
    return str_pad($hours_end, 2, '0', STR_PAD_LEFT) . ":" . $minutes;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['table_number'])) {
    $_SESSION['table_id'] = $_POST['table_number'];
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
    <link href="tables.css" rel="stylesheet">
    <title>Table Selection</title>
</head>
<body>
<form method="post">
    <div class="tables">
        <?php create_tables(); ?>
        <button type="submit" name="confirm_reservation">Submit</button>
    </div>
</form>
</body>
</html>