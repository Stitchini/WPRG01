<?php
function Union($arr1, $arr2)
{
    return array_unique(array_merge($arr1, $arr2));
}
function Diff($arr1, $arr2)
{
    return array_diff($arr1, $arr2);
}
function Intersection($arr1, $arr2)
{
    return array_intersect($arr1, $arr2);
}

?>

<html lang="en">
<head>
    <link href="zad04.css" rel="stylesheet">
    <title>Zadanie4</title>
</head>
<body>
<div class="mainattraction">
<fieldset id="form"><legend>Set Calculator</legend>
    <form method="POST" action="">
        <label for="SetA">Set A (use ',' between numbers)</label>
        <input type="text" name="SetA" placeholder="Input Set A here">
        <label for="SetB">Set B (use ',' between numbers)</label>
        <input type="text" name="SetB" placeholder="Input Set B here">
        <label for="Operation">Operation</label>
        <select name="Operation" id="Operation">
            <option value="UnionOfSets">Union Of Sets</option>
            <option value="DifferenceOfSets">Difference Of Sets</option>
            <option value="IntersectionOfSets">Intersection Of Sets</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
</fieldset>
</div>
<div class="answer">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['SetA']) && isset($_POST['SetB']) && isset($_POST['Operation'])){
            $setA = $_POST['SetA'];
            $setB = $_POST['SetB'];
            $op = $_POST['Operation'];
            $arrayA = explode(',', $setA);
            $arrayB = explode(',', $setB);
            $result = [];

            switch ($op){
                case "UnionOfSets":
                    $result = Union($arrayA, $arrayB);
                    echo implode(',', $result);
                    break;
                case "DifferenceOfSets":
                    $result = Diff($arrayA, $arrayB);
                    echo implode(',', $result);
                    break;
                case "IntersectionOfSets":
                    $result = Intersection($arrayA, $arrayB);
                    echo implode(',', $result);
                    break;
            }
        }

    }
    ?>
</div>
</body>
</html>
