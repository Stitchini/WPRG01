<html lang="en">
<head>
    <title>Clock</title>
    <link href="zad12.css" rel="stylesheet">
</head>
<body>
<?php $minute = date('i');
if ($minute <= 20){
    echo '<div class = "clock nr1"></div>';
}
elseif ($minute > 20 and $minute <= 40){
    echo '<div class = "clock nr2"></div>';
}
else {
    echo '<div class = "clock nr3"></div>';
}

?>
</body>
</html>


