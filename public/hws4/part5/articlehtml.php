

<?php
require_once 'News.php';
use part5\News;
session_start();
if(!isset($_GET['id']) || !isset($_SESSION['news'])): ?>
    <p>Article not found!</p>
<?php else:
    $news = $_SESSION['news'];
    echo $news->getArticle($_GET['id']);
?>

<?php endif; ?>
