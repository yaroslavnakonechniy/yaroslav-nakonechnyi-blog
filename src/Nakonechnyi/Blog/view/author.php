<?php
/** @var \Nakonechnyi\Blog\Block\Author $block */
?>
<section title="Posts">
    <h1><?= $block->getAuthor()->getName() ?></h1>

    <div class="post-list">
        <?php foreach ($block->getAuthorPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <p><a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a></p>
                <p>By <a href="<?= $block->getPostAuthor($post->getAuthorId())->getUrl()?>"><span><?= $block->getPostAuthor($post->getAuthorId())->getName()?></span></a></p>
                <p><?= $post->getDescription() ?></p>
                <p><span><?= $post->getDate() ?></span></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

