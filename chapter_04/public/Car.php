<?php

class Car{
    public $brand;
    public $model;
    public $price;

    public function __construct($brand,$model,$price)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
    }
}

//$car = new Car('丰田','汉兰达',350000);