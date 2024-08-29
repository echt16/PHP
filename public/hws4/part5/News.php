<?php

namespace part5;
require_once 'Article.php';
use part5\Article;

class News
{
    private array $listArticles;

    public function getArticles() : void
    {
        foreach ($this->listArticles as $article) {
            echo $article->getHeader('red', '40px');
            echo $article->getShortText('pink', '20px');
            echo '</hr>';
        }
    }

    public function getArticle(int $id) : void
    {
        $thisArticle = null;
        foreach ($this->listArticles as $article) {
            if ($article->id == $id) {
                $thisArticle = $article;
            }
        }
        echo $thisArticle->getHeader('red', '40px');
        echo '</hr>';
        echo $thisArticle->getShortText('pink', '20px');
        echo '</hr>';
        echo $thisArticle->getFullText('orange', '20px');
        echo '</hr>';
    }

    public function addArticle(string $header, string $shortText, string $fullText) : void {
        $this->listArticles[] = new Article($header, $shortText, $fullText);
    }


}

















