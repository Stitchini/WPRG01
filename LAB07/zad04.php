<html lang="en">
<head>
    <link href="zad04.css" rel="stylesheet">
    <title>Zadanie4</title>
</head>
<body>
<div class="mainattraction">
<fieldset id="form"><legend>Set Calculator</legend>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="SetA">Set A (use ',' between numbers)</label>
        <input type="text" name="SetA" placeholder="Input Set A here">
        <label for="SetB">Set B (use ',' between numbers)</label>
        <input type="text" name="SetB" placeholder="Input Set B here">
        <label for="Operation">Operation</label>
        <select name="Operation">
            <option value="UnionOfSets">Union Of Sets</option>
            <option value="DifferenceOfSets">Difference Of Sets</option>
            <option value="IntersectionOfSets">Intersection Of Sets</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
</fieldset>
</div>
<div class="answer">
    <?php include 'file.php'; ?>
</div>
</body>
</html>
