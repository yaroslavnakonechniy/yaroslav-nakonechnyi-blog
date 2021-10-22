<?php
/** @var \Nakonechnyi\Blog\Model\Category\Entity $category */
?>
<section title="Post">
    <h1><?= $category->getName() ?></h1>
    <div class="post-list">
        <?php foreach (blogGetCategoryPost($category->getCategoryId()) as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <p><?= $post['description'] ?></p>
                <p>By <span><?= $post['author']?></span> </p>
                <span>data: <?= $post['date'] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
