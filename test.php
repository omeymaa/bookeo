<?php

class Product {
    protected string $name;
    protected string $description;
    protected float $price;

    public function setPrice(float $price):void {
        $this->price = $price;
    }

    public function getPrice() {

    }
}

$product1 = new Product();