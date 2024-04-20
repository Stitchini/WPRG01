<?php
$c = 0;
$samogloski = ['a', 'e', 'i', 'o', 'u', 'y'];
$str = readline();
$str = strtolower($str);
$len = strlen($str);
for ($i = 0; $i < $len; $i++){
    if(! in_array($str[$i], $samogloski)){
        $c = $c + 1;
    }
}
echo $c;

