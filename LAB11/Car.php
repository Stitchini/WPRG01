<?php

class Car
{
    protected static int $count = 0;
    private int $price;
    private string $model;
    private float $exchangeRate;
    public function __construct($model, $price, $exchangeRate)
    {
        $this->model = $model;
        $this->price = $price;
        $this->exchangeRate = $exchangeRate;
        self::$count++;
    }

    public function __toString() : string
    {
        return "Model: " . $this->model . " Price: " . $this->price . " Exchange Rate: " . $this->exchangeRate;
    }



    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice(): int
    {
        return $this->price;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }
    public function getModel(): string
    {
        return $this->model;
    }
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }
    public function getExchangeRate() : float
    {
        return $this->exchangeRate;
    }
    public function value() : float
    {
        return $this->price * $this->exchangeRate;
    }
    public function amount() : int
    {
        return $this->count;
    }
}