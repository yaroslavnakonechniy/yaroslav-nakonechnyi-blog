<?php
/** @var \Nakonechnyi\Blog\Block\Post $block */
$post = $block->getPost();
?>
<div class="post-page">
    <p>dddddd</p>
    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getDescription() ?></p>
    <a href="<?= $block->getPostAuthor()->getUrl()?>"><h3><?= $block->getPostAuthor()->getName()?></h3></a>
    <span>data: <?= $post->getDate() ?></span>
</div>
