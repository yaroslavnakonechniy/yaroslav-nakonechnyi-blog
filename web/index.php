<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$requestDispatcher = new \Nakonechnyi\Framework\Http\RequestDispatcher([
    new \Nakonechnyi\Cms\Router(),
    new \Nakonechnyi\Catalog\Router(),
    new \Nakonechnyi\ContactUs\Router(),
]);

$requestDispatcher->dispatch();

exit;


switch ($requestUri) {

    default:
        if ($data = blogGetBlogByUrl($requestUri)) {
            $page = 'category.php';
            break;
        }

        if ($data = blogGetPostByUrl($requestUri)) {
            $page = 'post.php';
            break;
        }

        break;
}
