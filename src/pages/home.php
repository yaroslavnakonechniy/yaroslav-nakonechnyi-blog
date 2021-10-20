<!-- @TODO: Implement recently viewed posts -->
<section title="Recently Viewed Post">
    <h2>Recently Viewed Posts</h2>
    <div class="post-list">
        <?php foreach (blogGetNewPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <p><a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a></p>
                <p><?= $post['description'] ?></p>
                <p><?= $post['author'] ?></p>
                <p> <span>data: <?= $post['date']?></span></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
