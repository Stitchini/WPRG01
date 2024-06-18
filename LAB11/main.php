<?php
require_once "MyClass.php";
require_once "User.php";
require_once "Car.php";
require_once "NewCar.php";
$objekt = new MyClass();

$user = new User();

echo $user->introduction("Bob");
echo "\n";

$foor = new NewCar("Ford" , 2000, 4.16, true, false, true);

echo $foor;

