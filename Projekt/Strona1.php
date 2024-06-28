<?php
session_start();
unset($_SESSION['message']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['res_date']) && !empty($_POST["res_time"]) && !empty($_POST["people_number"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"])) {
        if (date("Y-m-d") > $_POST['res_date']){
            $_SESSION['message'] = "Select date NOT IN THE PAST";
        }
        else{
            if ($_POST['res_date'] == date('Y-m-d') && $_POST['res_time'] < date("H:i")){
                $_SESSION['message'] = "Time is in the past";
            }
        if ($_POST['res_time'] < "08:00" || $_POST['res_time'] > "19:00"){
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Old Joe's Diner - Reservation Form</title>
    <link rel="stylesheet" href="Strona1.css">
</head>
<body>
<div class="header">
    <h1>Old Joe's Diner</h1>
    <p class="address">Shady Sands</p>
</div>
<div class="container">
    <div class="locate-us">
        <h2>Locate Us</h2>
        <div class="map-container">
            <img src="MAP.png" alt="Map" class="map">
            <p>Find us in the heart of Shady Sands, right next to the main market area. Easy to reach by foot or brahmin cart.</p>
        </div>
    </div>
    <div class="content">
        <div class="about-section">
            <h2>About Us</h2>
            <p>Welcome to Old Joe's Diner, a beloved spot in Shady Sands.</p>
        </div>
        <div class="menu-section">
            <h2>Our Menu</h2>
            <div class="menu-item">
                <h3>Corn pone</h3>
                <p>A type of cornbread made with a corn-based dough that has been cooked in a pan over an open flame.</p>
            </div>
            <div class="menu-item">
                <h3>Yao guai ribs</h3>
                <p>The cooked rib meat of a yao guai.</p>
            </div>
            <div class="menu-item">
                <h3>Radscorpion fillet</h3>
                <p>Radscorpion meat that has been battered in radscorpion eggs and cooked.</p>
            </div>
            <div class="menu-item">
                <h3>Gecko pie</h3>
                <p>Gecko pie is a dish made from gecko meat. It is essentially a gecko meat pie.</p>
            </div>
            <div class="menu-item">
                <h3>Brahmin fries</h3>
                <p>Brahmin fries are a wasteland delicacy made from brahmin testicles.</p>
            </div>
            <div class="menu-item">
                <h3>Iguana soup</h3>
                <p>A bowl of Iguana bits soup.</p>
            </div>
        </div>
    </div>
    <div class="reservation-form">
        <h2>Reserve a table now</h2>
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
        <p class="small-print">The table will be booked for 3 hours.</p>
    </div>
</div>
<div class="footer">
    <div class="opening-hours">
        <h2>Opening Hours</h2>
        <p>Monday - Sunday: 8:00 - 21:00</p>
    </div>
    <div class="contact-info">
        <h2>Contact Us</h2>
        <p>Address: Shady Sands</p>
        <p>Radio Frequency: 104.5 FM</p>
        <p>Pip-Boy ID: 12345-A</p>
        <p>Local Messenger: Inquire at Shady Sands Bulletin Board</p>
    </div>
</div>
</body>
</html>







