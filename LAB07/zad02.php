<?php
$numbers = readline("how many numbers to convert: ");
$array = [];
for ($i = 0; $i < $numbers; $i++){
    $array[$i] = readline("number $i in hex: ");
}
$decarr = array_map("octdec", $array);
$hexarr = array_map("dechex", $decarr);
print_r($hexarr);
