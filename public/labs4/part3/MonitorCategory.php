<?php

namespace part3;

require_once 'Category.php';

class MonitorCategory extends Category
{
    public function __construct(string $name)
    {
        parent::__construct($name, ['diagonal']);
    }
}