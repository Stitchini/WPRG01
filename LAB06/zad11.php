<html lang="en">
<head>
    <title>Fahrenheit to Celsius and Celsius to Fahrenheit</title>
    <link href="zad11.css" rel="stylesheet">
</head>
<body>
<table>
    <thead>
    <th>Celsius</th>
    <th>Fahrenheit</th>
    <th>Fahrenheit</th>
    <th>Celsius</th>
    </thead>
    <tbody>
    <tr>
        <td>40</td><td><?php echo CtoF(40)?></td>
        <td>120</td><td><?php echo FtoC(120)?></td>
    </tr>
    <tr>
        <td>39</td><td><?php echo CtoF(39)?></td>
        <td>110</td><td><?php echo FtoC(110)?></td>
    </tr>
    <tr>
        <td>32</td><td><?php echo CtoF(32)?></td>
        <td>40</td><td><?php echo FtoC(40) ?></td>
    </tr>
    <tr>
        <td>31</td><td><?php echo CtoF(31)?></td>
        <td>30</td><td><?php echo FtoC(30)?></td>
    </tr>
    </tbody>
</table>
</body>
</html>






<?php
function CtoF($cels) : float
{
    return round(($cels * 1.8) + 32, 2);
}
function FtoC($fahrs) : float
{
    return round(($fahrs - 32) / 1.8, 2);
}
?>