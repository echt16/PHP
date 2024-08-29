<?php

namespace part5;

class Article
{
    public int $id;

    public function __construct(public string $header, public string $shortText, public string $fullText)
    {
        $this->id = rand(1, 1000);
    }

    public function getHeader(string $color, string $textSize): void
    {
        echo "<p style='color: $color; text-size:$textSize'><a href='articlehtml.php?id={$this->id}'>$this->header<a/></p>";
    }

    public function getShortText(string $color, string $textSize) : void
    {
        echo "<p style='color: $color; text-size:$textSize'>$this->shortText</p>";
    }

    public function getFullText(string $color, string $textSize) : void
    {
        echo "<p style='color: $color; text-size:$textSize'>$this->fullText</p>";
    }
}





















