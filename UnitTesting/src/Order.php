<?php
namespace App;

class Order
{
    protected $paymenService;
    protected $price;

    public function __construct($paymenService) {
        $this->paymenService = $paymenService;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function process()
    {
        $this->paymenService->pay();
        return true;
    }
}