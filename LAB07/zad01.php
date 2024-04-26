<?php
$arrsize = readline("Array size: ");
$array = [];
$symbol = '$';
for ($i = 0; $i < $arrsize; $i++){
    $array[$i] = readline("$i position: ");
}
$position = readline('Input position for $: ');
if ($position > count($array) or $position < 0){
    echo "Error";
}else {
    array_splice($array, $position, 0, $symbol);
    print_r($array);}