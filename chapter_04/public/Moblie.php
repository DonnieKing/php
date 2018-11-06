<?php

class Moblie{
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

//$moblie = new Moblie('华为','Mate20 pro',8800);