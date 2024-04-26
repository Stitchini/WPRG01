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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" id="num1" name="num1" placeholder="num1">
            <select id="operator" name="operator">
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" id="number" name="number">
            <select id="option" name="option">
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
    <?php include 'simple.php';?>
</div>
<div class="advanswer">
    <?php include 'advanced.php';?>
</div>
</body>
</html>
