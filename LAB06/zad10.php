<?php
function chars($haslo){
    if(!ctype_alnum($haslo)){
        return false;
    }
    else{
        return true;
    }
}
function twodigits($haslo){
    $arrhaslo = str_split($haslo);
    $c= 0;
    foreach($arrhaslo as $znak) {
        if (is_numeric($znak)) {
            $c++;
        }
    }
    if($c >= 2){
        return true;
    }
    else{
        return false;
    }
}
do{
    $password = readline("Wpisz haslo: ");
    $passlng = strlen($password);
    $numbers = twodigits($password);
    $alphanumeric = chars($password);



}while($passlng < 8 or $numbers == false or $alphanumeric == false);
echo "Dobre Haslo";