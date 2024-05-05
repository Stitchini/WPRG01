<?php
function checkPhone($phone)
{
    $vibecheck = "/^\\+?[1-9][0-9]{7,14}$/";
    if (!preg_match($vibecheck, $phone)){
        return "Error: not a valid number";
    }
    return $phone;
}
function checkEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "Eroor: not a valid email";
    }
    return $email;
}
function checkBoxes($box1, $box2)
{
    if (isset($_POST['checkbox1'], $_POST['checkbox2']))return $box1 . $box2;
    else if (isset($_POST['checkbox1'])&& !isset($_POST['checkbox2']))return $box1 . "off";
    else if (!isset($_POST['checkbox1'])&& isset($_POST['checkbox2']))return "off" . $box2;
    return "Error";
}
function boxAnswer($checkbox)
{
    if ($checkbox = "onon")return "Option1 + Option2";
    else if ($checkbox = "onoff")return "Option1";
    else if ($checkbox = "offon")return "Option2";
    return "Error";
}
function radioAnswer($radio)
{
    if ($radio = "radio1")return "Option1";
    else if ($radio = "radio2")return "Option2";
    return "Error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="zad07.css">
</head>
<body>
<div class="container">
    <h2>Contact Form</h2>
    <form method="post" action="">
        <div class="text-input">
            <input type="text" placeholder="Name and Surename" name="fullName" id="fullName" required>
            <input type="email" placeholder="Email Address" name="email" id="email" required>
            <input type="tel" placeholder="Telephone Number" name="tel" id="tel" required>
            <select id="topics" name="topics" required>
                <option value="" disabled selected hidden>Select topic</option>
                <option value="topic1">Topic 1</option>
                <option value="topic2">Topic 2</option>
            </select>
            <textarea placeholder="Message..." name="message" id="message"></textarea>
            <p>Select option:</p>
            <div class="checkbox-choice">
                <label><input type="checkbox" name="checkbox1" id="checkbox1"> Option 1</label>
                <label><input type="checkbox" name="checkbox2" id="checkbox2"> Option 2</label>
            </div>
            <p>Select ONE option:</p>
            <div class="radio-choice">
                <label><input type="radio" name="radio" id="radio1"> Option 1</label>
                <label><input type="radio" name="radio" id="radio2"> Option 2</label>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            if (isset($_POST["fullName"]) + isset($_POST["email"]) + isset($_POST["tel"]) + isset($_POST["topics"]) + isset($_POST["message"]) + isset($_POST["checkbox1"]) + isset($_POST["checkbox2"])){
                $name = $_POST["fullName"];
                $email = checkEmail($_POST["email"]);
                $number = checkPhone($_POST["tel"]);
                $topic = $_POST["topics"];
                $message = $_POST["message"];
                $checkbox = checkBoxes($_POST["checkbox1"] ?? null, $_POST["checkbox2"] ?? null);
                $radio = $_POST["radio"];
                echo "<div class='answer'><h1>Output: </h1><ul>";
                echo "<li>" . $name . "</li>";
                echo "<li>" . $email . "</li>";
                echo "<li>" . $number . "</li>";
                echo "<li>" . $message . "</li>";
                echo "<li>" . boxAnswer($checkbox) . "</li>";
                echo "<li>" . radioAnswer($radio) . "</li>";
                echo "</ul></div>";
            }
        }catch (Exception $exception){
            echo "Error: " . $exception->getMessage();
        }
    }
    ?>
</body>
</html>

