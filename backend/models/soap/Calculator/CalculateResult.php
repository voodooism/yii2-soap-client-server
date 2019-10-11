<?php

namespace backend\models\soap\Calculator;


class CalculateResult
{
    /** @var int */
    public $price;

    /** @var string */
    public $info;

    public function __construct(int $price, string $info)
    {
        $this->price = $price;
        $this->info = $info;
    }
}