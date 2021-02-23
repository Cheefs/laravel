<?php include $_SERVER['DOCUMENT_ROOT']. '/../resources/views/' .'menu.php' ?>

<h1>All News</h1>

<?php if (count($list)): ?>
    <?php foreach ( $list as $k => $v ): ?>
        <div>
            <a href="<?= route('news.view', $k) ?>"><?= $v['title'] ?></a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>News not found!</h3>
<?php endif; ?>
