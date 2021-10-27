<?php
//
//declare(strict_types=1);
//
//
//function blogGetNewPosts(): array
//{
//    $posts = blogGetPost();
//    $key = [];
//    $sortArray = [];
//    $time = time();
//    $number = 0;
//
//    foreach ($posts as $post) {
//        $keyPost = $time - strtotime($post['date']);
//        $key[$keyPost] = $post;
//    }
//
//    ksort($key);
//    krsort($key);
//
//    return $key;
//}
