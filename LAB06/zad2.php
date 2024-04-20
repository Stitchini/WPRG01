<?php
echo "a b pow(a,b)<br>";
for ($a = 1, $b = 2; $a <= 5; $a++, $b++){
    echo "$a $b ";
    echo pow($a, $b);
    echo "<br>";
}
