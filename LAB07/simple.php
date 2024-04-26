<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operation = $_POST['operator'];
switch ($operation){
    case "+":
        $result = $num1 + $num2;
        break;
        case "-":
            $result = $num1 - $num2;
            break;
    case "*":
        $result = $num1 * $num2;
        break;
    case "/":
        $result = $num1 / $num2;
}
echo "<h3>Result: $result</h3>";

}