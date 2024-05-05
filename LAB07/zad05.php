<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link href="zad05.css" rel="stylesheet">
</head>
<body>
<h1>Calculator</h1>
<div class="calculator">
    <div class="form-container">
        <form action="" method="post">
            <input type="text" id="num1" name="num1" placeholder="num1">
            <select id="option" name="option">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" id="num2" name="num2" placeholder="num2">
            <input type="submit" value="Calculate" class="submit-btn">
        </form>
    </div>
    <div class="form-container">
        <form action="" method="post">
            <input type="text" id="number" name="number">
            <select id="operator" name="operator">
                <option value="Sinus">Sinus</option>
                <option value="Cosinus">Cosinus</option>
                <option value="Tangens">Tangens</option>
                <option value="bintodec">Binary to Decimal</option>
                <option value="dectobin">Decimal to Binary</option>
                <option value="dectohex">Decimal to Hexadecimal</option>
                <option value="hextodec">Hexadecimal to Decimal</option>
            </select>
            <input type="submit" value="Submit" class="submit-btn">
        </form>
    </div>
</div>
<div class="simpleanswer">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            if (isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["option"])){
                $a = $_POST["num1"];
                $b = $_POST["num2"];
                $operator = $_POST["option"];
                $result = 0;
                switch ($operator){
                    case "+":
                        $result = add($a, $b);
                        break;
                    case "-":
                        $result = subtract($a,$b);
                        break;
                    case "*":
                        $result = multiply($a,$b);
                        break;
                    case "/":
                        $result = divide($a,$b);
                        break;
                }
            }
            if (isset($_POST["number"]) && isset($_POST["operator"])){
                $number = $_POST["number"];
                $operation = $_POST["operator"];
                $result = 0;
                switch ($operation){
                    case "Sinus":
                        $result = sinus($number);
                        break;
                    case "Cosinus":
                        $result = cosinus($number);
                        break;
                    case "Tangens":
                        $result = tangens($number);
                        break;
                    case "bintodec":
                        $result = bintodec($number);
                        break;
                    case "dectobin":
                        $result = dectobin($number);
                        break;
                    case "dectohex":
                        $result = dectohex($number);
                        break;
                    case "hextodec":
                        $result = hextodec($number);
                        break;
                }
            }
            echo $result;
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }
    ?>
</div>
</body>
</html>
<?php
function add($a, $b)
{
    return $a + $b;
}
function subtract($a, $b)
{
    return $a - $b;
}
function multiply($a, $b)
{
    return $a * $b;
}
function divide($a, $b)
{
    if($b == 0)throw new Exception('Error: div by 0');
        return $a / $b;
}
function sinus($a)
{
    return sin($a);
}
function cosinus($a)
{
    return cos($a);
}
function tangens($a)
{
    return tan($a);
}
function bintodec($a)
{
    if(!preg_match('/^[01]+$/', $a))throw new Exception("Error: not binary");
        return bindec($a);
}
function dectobin($a)
{
    if(!is_numeric($a))throw new Exception("Error: not numeric");
    return decbin($a);
}
function dectohex($a)
{
    if(!is_numeric($a))throw new Exception("Error: not numeric");
        return dechex($a);
}
function hextodec($a)
{
    if(!preg_match('/[0-9A-Fa-f]+$/', $a))throw new Exception("Error: not hex");
        return hexdec($a);
}
?>
