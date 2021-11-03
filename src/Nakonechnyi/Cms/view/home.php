<?php
/** @var \Nakonechnyi\Blog\Block\Post $block */
?>
<section title="Recently Viewed Post">
    <h2>Recently Viewed Posts</h2>
    <div class="post-list">
        <?php foreach ($block->getPost() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <p><a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a></p>
                <p><?= $post->getDescription() ?></p>
                <p><?= $post->getAuthor() ?></p>
                <p> <span>data: <?= $post->getDate() ?></span></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
/** @var \Nakonechnyi\Blog\Block\Post $block */
$post = $block->getPost();
?>
<div class="post-page">
    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getDescription() ?></p>
    <p><?= $post->getAuthor() ?></p>
    <span>data: <?= $post->getDate() ?></span>
</div>
