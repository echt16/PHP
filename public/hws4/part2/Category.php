<?php

namespace part2;

class Category
{
    public array $listProduct;
    public function __construct(public string $name, public array $filters)
    {
        $this->filters[] = 'price';
    }
}