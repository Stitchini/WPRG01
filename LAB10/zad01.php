<?php
$passwords = ['admin' => 'administrator', 'user' => 'password', 'user1' => 'testing'];

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];
if(!isset($username) || !isset($password)){
    header('WWW-Authenticate: Basic realm=Poggers');
}else{
    echo 'jestes zalogowany jako ' .$username;
}