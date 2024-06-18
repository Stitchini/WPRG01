<?php
require_once "Car.php";
class NewCar extends Car
{
    private bool $alarm, $radio, $climatronic;
    public function __construct($model, $price, $exchangeRate, $alarm, $radio, $climatronic)
    {
        parent::__construct($model, $price, $exchangeRate);
        $this->radio = $radio;
        $this->alarm = $alarm;
        $this->climatronic = $climatronic;
    }

    public function value(): float
    {
        $moni = parent::value();
        if ($this->alarm){
            $moni *= 1.05;
        }
        if ($this->radio){
            $moni *= 1.075;
        }
        if ($this->climatronic){
            $moni *= 1.1;
        }
        return $moni;
    }

    public function getAlarm() : bool
    {
        return $this->alarm;
    }
    public function setAlarm($alarm)
    {
        $this->alarm = $alarm;
    }
    public function getRadio() : bool
    {
        return $this->radio;
    }
    public function setRadio($radio)
    {
        $this->radio = $radio;
    }
    public function getClimatronic() : bool
    {
        return $this->climatronic;
    }
    public function setClimatronic($climatronic)
    {
        $this->climatronic = $climatronic;
    }

    public function __toString() : string
    {
        return parent::__toString() . " Alarm: " . var_export($this->alarm,1) . " Radio: " . var_export($this->radio, 1) . " Climatronic: " . var_export($this->climatronic, 1);
    }
}
