<?php

declare(strict_types=1);

namespace Nakonechnyi\Catalog;

use Nakonechnyi\Catalog\Controller\Category;
use Nakonechnyi\Catalog\Controller\Post;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    private \Nakonechnyi\Framework\Http\Request $request;

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = blogGetBlogByUrl($requestUrl)) {
            $this->request->setParameter('category',$data);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post',$data);
            return Post::class;
        }

        return '';
    }
}
