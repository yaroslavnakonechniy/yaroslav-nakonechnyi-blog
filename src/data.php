<?php

declare(strict_types=1);

function blogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'Sport',
            'url'         => 'sport',
            'posts'    => [1]
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'TV',
            'url'         => 'tv',
            'posts'    => [3]
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Shoping',
            'url'         => 'shoping',
            'posts'    => [2]
        ],
    ];
}

function blogGetPost(): array
{
    return [
        1 => [
            'post_id'  => 1,
            'name'        => 'Football',
            'url'         => 'football',
            'description' => 'NFL Week 5 game picks, ',
            'author'      => 'Ivan Salabay',
            'date'       => '11.06.2021'
        ],
        2 => [
            'post_id'  => 2,
            'name'        => 'Nike',
            'url'         => 'tenis',
            'description' => 'Nike - it is good',
            'author'      => 'Oleg Vinik',
            'date'       => '02.12.2021'
        ],
        3 => [
            'post_id'  => 4,
            'name'        => 'News for world',
            'url'         => 'news-for-world',
            'description' => 'sdfds dsfdsf sfdsf sdf',
            'author'      => 'Mihail Son',
            'date'       => '01.02.2021'
        ]
    ];
}

function blogGetNewPosts(): array
{
    $posts = blogGetPost();
    $key = [];
    $sortArray = [];
    $time = time();
    $number = 0;

    foreach ($posts as $post) {
        $keyPost = $time - strtotime($post['date']);
        $key[$keyPost] = $post;
    }

    ksort($key);
    krsort($key);

    return $key;
}

function blogGetCategoryPost(int $categoryId): array
{
    $categories = blogGetCategory();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = blogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Product with ID $postId from category $categoryId does not exist");
        }

        $postsForCategory[] = $posts[$postId];
    }

    return $postsForCategory;
}

function blogGetBlogByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetCategory(),
        static function ($category) use ($url) {
            return $category['url'] === $url;
        }
    );

    return array_pop($data);
}

function blogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetPost(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}
