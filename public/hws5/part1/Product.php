<?php
namespace part1;

class Product
{
    public function __construct(private string $name, private int $count, private float $price){

    }
    public function getName(): string{
        return $this->name;
    }
    public function getCount(): int{
        return $this->count;
    }
    public function getPrice(): float{
        return $this->price;
    }
}