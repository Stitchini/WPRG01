<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Aset = $_POST['SetA'];
    $Bset = $_POST['SetB'];
    $Asetarr = explode(',', $Aset);
    $Bsetarr = explode(',', $Bset);

    $operation = $_POST['Operation'];

    switch ($operation) {
        case 'UnionOfSets':
            $result = array_unique(array_merge($Asetarr, $Bsetarr));
            break;
        case 'DifferenceOfSets':
            $result = array_diff($Asetarr, $Bsetarr);
            break;
        case 'IntersectionOfSets':
            $result = array_intersect($Asetarr, $Bsetarr);
            break;
        default:
            $result = "Error";
            break;
    }
    echo "<h3>Result: [ " . implode(", ", $result) . " ]</h3>";
}
?>