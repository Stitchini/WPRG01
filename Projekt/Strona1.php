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
session_start();
unset($_SESSION['message']);
$show_tables = false;
$people_number = 0;

if ($_SERVER["REQUEST_METHOD"] == TRUE && isset($_POST["check_availability"])){
    if (!empty($_POST['res_date']) && !empty($_POST["res_time"]) && !empty($_POST["people_number"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"])){
    $date = $_SESSION['date'] = $_POST['res_date'];
    $time = $_SESSION['time'] = $_POST['res_time'];
    $people_number = $_SESSION['people_number'] = $_POST['people_number'];
    $firstname = $_SESSION['first_name'] = $_POST['first_name'];
    $lastname = $_SESSION['last_name'] = $_POST['last_name'];
    $show_tables = true;
    header("Location: tables.php");
    exit();
    }
    else{
        $_SESSION['message'] = 'Data input kaputt';
        }
}

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="res_date">Date:</label>
    <input type="date" name="res_date"><br>
    <label for="res_time">Time:</label>
    <input type="time" name="res_time"><br>
    <label for="people_number">Number of people:</label>
    <input type="number" id="people_number" name="people_number" min="1" max="6" >
    <label for="first_name">First name:</label>
    <input type="text" name="first_name" placeholder="firstname" >
    <label for="last_name">Last name:</label>
    <input type="text" name="last_name" placeholder="lastname" ><br>
    <button type="submit" name="check_availability">Check availability</button>
</form>
<div>
    <?= $_SESSION['message'] ?? '' ?>
</div>
</body>
</html>
