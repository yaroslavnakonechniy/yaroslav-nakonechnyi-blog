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
