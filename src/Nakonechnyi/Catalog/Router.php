<?php

declare(strict_types=1);

namespace Nakonechnyi\Catalog;

use Nakonechnyi\Catalog\Controller\Category;
use Nakonechnyi\Catalog\Controller\Post;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
//        require_once '../src/data.php';

//        if ($data = blogGetBlogByUrl($requestUrl)) {
//            return Category::class;
//        }
//
//        if ($data = blogGetPostByUrl($requestUrl)) {
//            return Post::class;
//        }


        return '';
    }

}
