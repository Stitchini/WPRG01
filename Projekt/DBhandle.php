<?php
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
?>