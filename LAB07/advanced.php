<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$number = $_POST['number'];
$op = $_POST['option'];

switch ($op){
    case "Sinus":
        $result = sin($number);
        break;
    case "Cosinus":
        $result = cos($number);
        break;
    case "Tangens":
        $result = sin($number) / cos($number);
        break;
    case "bintodec":
        $result = bindec($number);
        break;
    case "dectobin":
        $result = decbin($number);
        break;
    case "dectohex":
        $result = dechex($number);
        break;
    case "hextodec":
        $result = hexdec($number);
        break;
}
echo "<h3>Result: $result</h3>";
}
