<?php include $_SERVER['DOCUMENT_ROOT']. '/../resources/views/' .'menu.php' ?>

<h1><?= $category['title'] ?></h1>

<?php if (count($news)): ?>
    <?php foreach ( $news as $item ): ?>
        <div>
            <a href="<?= route('news.view', $item['id']) ?>"><?= $item['title'] ?></a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>News for that category not found!</h3>
<?php endif; ?>
