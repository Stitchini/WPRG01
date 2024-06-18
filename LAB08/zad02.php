<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web App??</title>
    <link href="zad02.css" rel="stylesheet">
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
</html>


<?php
