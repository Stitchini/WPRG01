<?php
function reverse($input)
{
    return strrev($input);
}
function toupper($input)
{
    return strtoupper($input);
}
function tolower($input)
{
    return strtolower($input);
}
function chcount($input)
{
    return count($input);
}
function nowhitespaces($input)
{
    return trim($input);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>String Operations</title>
    <link href="zad01.css" rel="stylesheet">
</head>
<body>
<div class="form">
    <form action="" method="post">
        <label for="input">Input text</label>
        <input type="text" name="input" id="input">
        <label for="operation">Select Operation</label>
        <select id="operation" name="operation" required>
            <option disabled selected hidden>Select operation</option>
            <option value="rev">Reverse</option>
            <option value="toupper">Change ALL to UPPERCASE</option>
            <option value="tolower">Change ALL to lowercase</option>
            <option value="count">Count symbols</option>
            <option value="delete">Remove whitespaces</option>
        </select>
        <button type="submit" name="submit" id="submit">Submit</button>
    </form>
</div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["input"]) && isset($_POST["operation"])){
            echo '<div class="result">';
            $inputtext = $_POST["input"];
            $operation = $_POST["operation"];
            $result = "";
            switch ($operation){
                case "reverse":
                    $result = reverse($inputtext);
                    break;
                case "toupper":
                    $result = toupper($inputtext);
                    break;
                case "tolower":
                    $result = tolower($inputtext);
                    break;
                case "count":
                    $result =  chcount($inputtext);
                    break;
                case "delete":
                    $result = nowhitespaces($inputtext);
                    break;
            }
            echo $result . "</div>";
        }
    }
    ?>
</body>
</html>






<?php
