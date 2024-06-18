<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visit Count</title>
    <link rel="stylesheet" href="zad02.css">
</head>
<body>
<h2>Visit Count</h2>
<div class="visits">
    <?php
    $visits = file_get_contents("licznik.txt");
    $visits = $visits + 1;
    echo "Visits: " . $visits;
    file_put_contents("licznik.txt", $visits);
    ?>
    <form method="post">
    <input type="submit" name="numreset" id="numreset" onclick="numreset()" value="Reset">
    </form>
</div>
</body>
<?php
function numreset() : void
{
    $num = file_get_contents("licznik.txt");
    $num = 0;
    file_put_contents("licznik.txt", $num);
}
?>