<?php include $_SERVER['DOCUMENT_ROOT']. '/../resources/views/' .'menu.php' ?>

<h1>News Category`s</h1>

<?php if (count($list)): ?>
    <?php foreach ( $list as $category ): ?>
        <div>
            <a href="<?= route('news.category.view', $category['slug']) ?>"><?= $category['title'] ?></a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>Category`s not found!</h3>
<?php endif; ?>
