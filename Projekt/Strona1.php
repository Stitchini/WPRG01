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
<?php
$show_tables = false;
$people_number = 0;

if ($_SERVER["REQUEST_METHOD"] == TRUE && isset($_POST["check_availability"])){
    $date = $_POST['res_date'];
    $time = $_POST['res_time'];
    $people_number = $_POST['people_number'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $show_tables = true;
}

?>
<form method="post" action="">
    <label for="res_date">Date:</label>
    <input type="date" name="res_date"><br>
    <label for="res_time">Time:</label>
    <input type="time" name="res_time"><br>
    <label for="people_number">Number of people:</label>
    <input type="number" id="people_number" name="people_number" min="1" max="6" required>
    <label for="first_name">First name:</label>
    <input type="text" name="first_name" placeholder="firstname">
    <label for="last_name">Last name:</label>
    <input type="text" name="last_name" placeholder="lastname"><br>
    <button type="submit" name="check_availability">Check availability</button>
</form>
<?php if ($show_tables): ?>
<form method="post" action="reservation_submission.php">
    <input type="hidden" name="res_date" value="<?= htmlspecialchars($date) ?>">
    <input type="hidden" name="res_time" value="<?= htmlspecialchars($time) ?>">
    <input type="hidden" name="first_name" value="<?= htmlspecialchars($firstname) ?>">
    <input type="hidden" name="last_name" value="<?= htmlspecialchars($lastname) ?>">
    <input type="hidden" name="people_number" value="<?= htmlspecialchars($people_number) ?>">

    <?php
    $availableTables = [];
    $unavailableTables = [];
    if ($people_number <= 4){
        $availableTables = [2,4,6,8];
        $unavailableTables = [1,3,5,7,9];
    }
    elseif ($people_number <=6){
        $availableTables = [1,3,5,7,9];
        $unavailableTables = [2,4,6,8];
    }
    for ($i = 1; $i <= 9; $i++){
        $available = in_array($i, $availableTables);
        $class = $available ? 'available' : 'unavailable';
        $disabled = $available ? '' : 'disabled';
        echo '<input type="radio" id="table' . $i . '" name="table_number" value="' . $i . '" ' . $disabled . '>';
        echo '<label for="table' . $i . '" class="' . $class . '">Table ' . $i . '</label><br>';
    }
    ?>
    <button type="submit" name="confirm_reservation">Confirm Reservation</button>
</form>
<?php endif; ?>
</body>
</html>
