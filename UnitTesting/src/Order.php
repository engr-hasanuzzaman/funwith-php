<?php
namespace App;

class Order
{
    protected $payment_service;
    protected $price;

    public function __construct($payment_service) {
        $this->payment_service = $payment_service;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function process()
    {
        $this->payment_service->pay();
    }
}