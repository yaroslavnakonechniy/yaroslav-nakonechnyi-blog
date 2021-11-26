<?php
/**  @var \Nakonechnyi\Cms\Block\NewestPosts $block */
?>
<section title="Recently Viewed Post">
    <h2>Recently Viewed Posts</h2>
    <div class="post-list">
        <?php foreach ($block->getNewestPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <p><a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a></p>
                <p><?= $post->getDescription() ?></p>
                <p>By <a href="<?= $block->getPostAuthor($post->getAuthorId())->getUrl()?>"><span><?= $block->getPostAuthor($post->getAuthorId())->getName()?></span></a></p>
                <p> <span>data: <?= $post->getDate() ?></span></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>