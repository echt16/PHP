<?php

namespace part2;

require_once 'Category.php';

class PhoneCategory extends Category
{
    public function __construct(string $name)
    {
        parent::__construct($name, ['ram', 'countSim', 'hdd']);
    }
}