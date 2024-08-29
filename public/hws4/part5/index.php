<?php
require_once 'News.php';

use part5\News;

session_start();
$news = $_SESSION['news'] ?? new News();
//$news->addArticle('header1', 'short1', 'full1');
//$news->addArticle('header2', 'short2', 'full2');
//$news->addArticle('header3', 'short3', 'full3');
//$news->addArticle('header4', 'short4', 'full4');
//$news->addArticle('header5', 'short5', 'full5');

$_SESSION['news'] = $news;
$news->getArticles();
echo '</hr>';

$images = [
    'https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://images.unsplash.com/photo-1576158113928-4c240eaaf360?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://images.unsplash.com/photo-1576158114254-3ba81558b87d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://plus.unsplash.com/premium_photo-1672116453187-3aa64afe04ad?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://images.unsplash.com/photo-1576158114131-f211996e9137?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://images.unsplash.com/photo-1579818276426-2f2bca600658?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://images.unsplash.com/photo-1579158949482-3e9e0ac69333?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8aW1hZ2V8ZW58MHx8MHx8fDA%3D',
    'https://images.unsplash.com/photo-1579159278991-f698b0667a16?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D'
];

$page = $_SESSION['page'] ?? 1;
$count = $_SESSION['count'] ?? 5;

if (isset($_POST['count'])) {
    $count = max(1, (int)$_POST['count']); // Ensuring count is at least 1
    $_SESSION['count'] = $count;
}

if (isset($_POST['page'])) {
    $page = max(1, (int)$_POST['page']); // Ensuring page is at least 1
    $_SESSION['page'] = $page;
}

function previous()
{
    global $page;
    if ($page > 1) {
        $page--;
        $_SESSION['page'] = $page;
    }
}

function nextPage()
{
    global $images, $page, $count;
    if ($page * $count < count($images)) {
        $page++;
        $_SESSION['page'] = $page;
    }
}

if (isset($_POST['prev'])) {
    previous();
}

if (isset($_POST['next'])) {
    nextPage();
}

?>

<form method="post">
    <label for="count">Images per page:</label>
    <input type="number" name="count" value="<?= $count ?>" onchange="this.form.submit()">

    <div style="display: flex; justify-content: space-around">
        <?php
        $start = max(0, ($page - 1) * $count);
        $end = min($start + $count, count($images));
        for ($i = $start; $i < $end; $i++) {
            echo '<img src="' . $images[$i] . '" style="max-width: 100px; max-height: 100px;"/>';
        }
        ?>
    </div>

    <div style="display: flex; justify-content: space-between">
        <button type="submit" name="prev">Previous</button>
        <button type="submit" name="next">Next</button>
    </div>
</form>











