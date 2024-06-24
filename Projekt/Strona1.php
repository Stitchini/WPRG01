<?php
session_start();
unset($_SESSION['message']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['res_date']) && !empty($_POST["res_time"]) && !empty($_POST["people_number"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"])) {
        if (date("Y-m-d") > $_POST['res_date']){
            $_SESSION['message'] = "Select date NOT IN THE PAST";
        }
        else{
        if (date("H") < 8 && date("H") > 19){
            $_SESSION['message'] = "Kaputt die buisness ist nicht geoffnet";
        }
        else{
        if (intval($_POST['people_number'] < 1 || $_POST['people_number'] > 6)){
            $_SESSION['message'] = "Wrong number of people";
        }
        else{
        $_SESSION['date'] = $_POST['res_date'];
        $_SESSION['time'] = $_POST['res_time'];
        $_SESSION['people_number'] = $_POST['people_number'];
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        header("Location: tables.php");
        exit();}}}
    } else {
        $_SESSION['message'] = 'Kaputt- input invalid';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Form</title>
</head>
<body>
<form method="post">
    <label for="res_date">Date:</label>
    <input type="date" name="res_date"><br>
    <label for="res_time">Time:</label>
    <input type="time" name="res_time"><br>
    <label for="people_number">Number of people:</label>
    <input type="number" id="people_number" name="people_number" min="1" max="6"><br>
    <label for="first_name">First name:</label>
    <input type="text" name="first_name" placeholder="First name"><br>
    <label for="last_name">Last name:</label>
    <input type="text" name="last_name" placeholder="Last name"><br>
    <button type="submit" name="check_availability">Check availability</button>
</form>
<div>
    <?= $_SESSION['message'] ?? '' ?>
</div>
</body>
</html>