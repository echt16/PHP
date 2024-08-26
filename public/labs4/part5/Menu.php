<?php

namespace part5;
require_once('MenuItem.php');

use part5\MenuItem;

class Menu
{
    private array $listItems;

    public function __construct()
    {
        $this->listItems = [];
    }

    public function printMenu(string $width, string $height, string $backgroundColor, string $color): void
    {
        echo "
            <div style='display: flex; justify-content: space-around; align-items: center;width: $width; height: $height; background-color: $backgroundColor; color: $color; border: 1px solid $color'>";
                foreach ($this->listItems as $item) {
                    echo "<a href='{$item->url}'>$item->name</a>";
                }
            echo "</div>";
    }

    public function addMenuItem(string $name, string $url): void
    {
        $this->listItems[] = new MenuItem($name, $url);
    }
}