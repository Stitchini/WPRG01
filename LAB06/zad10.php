<?php
function chars($haslo) : bool{
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
function alphanumeric($haslo)
{
    return ctype_alnum($haslo);
}
do{
    $password = readline("Wpisz haslo: ");
    $passlng = strlen($password);
    $chartrue = chars($password);
    $numbers = twodigits($password);



}while($passlng > 8 and chars() == true and alphanumeric() ==true);
echo "Dobre Haslo";