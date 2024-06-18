<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FileSize</title>
    <link rel="stylesheet" href="zad01.css">
</head>
<body>
<h2>Input directory or file name</h2>
<div class="form">
    <form action="" method="post">
    <input type="text" name="file" id="file">
    <button type="submit" name="submit" id="submit">Submit</button>
    </form>
</div>
<div class="result">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["file"])){
            $filename = $_POST["file"];
            $size = filesize($filename);
            echo "<p>" . $size . " Bytes</p>";
            echo "<p>" . $size/1000 . " KiloBytes</p>";
            echo "<p>" . $size/1000000 . " MegaBytes</p>";
            echo "<p>" . $size/1000000000 . " GigaBytes</p>";
        }
    }
    ?>
</div>
</body>

