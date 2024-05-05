<?php
function easterdate($year){
    if ($year <= 0) throw new Exception('Error: wrong year');
    $x = 0;
    $y = 0;
    switch ($year){
        case 1-1582:
            $x = 15;
            $y = 6;
            break;
        case 1583-1699:
            $x = 22;
            $y = 2;
            break;
        case 1700-1799:
            $x = 23;
            $y = 3;
            break;
        case 1800-1899:
            $x = 23;
            $y = 4;
            break;
        case 1900-2099:
            $x = 24;
            $y = 5;
            break;
        case 2100-2199:
            $x = 24;
            $y = 6;
            break;
    }
    $a = $year % 19;
    $b = $year % 4;
    $c = $year % 7;
    $d = (19 * $a + $x) % 30;
    $e = (2*$b + 4 * $c + 6 * $d + $y) % 7;
    if ($e == 6 && $d == 29){
        return "26/04.$year";
    }
    else if ($e == 6 && $d == 28 && ((11 * $x + 11) % 30) < 19 ){
        return "18/04/$year";
    }
    else if ($d + $e < 10){
        return (22 + $d + $e)."/03/$year";
    }
    else if ($d + $e > 9){
        return ($d + $e - 9)."/04/$year";
    }else{
        return "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Easter Date</title>
    <link href="zad06.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Zadanie 9</h1>
    <p>To calculate Easter date, input year below:</p>
    <form action="" method="post">
    <div class="input-container">
        <label for="year">Input year:</label>
        <input type="text" id="year" name="year">
    </div>
    <button type="submit">Calculate</button>
    </form>
    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                if (isset($_POST['year'])){
                    $year = $_POST['year'];
                    echo easterdate($year);
                }
            }catch (Exception $exception){
                echo "Error: " . $exception->getMessage();
            }
        }
        ?>
    </div>
</div>
</body>