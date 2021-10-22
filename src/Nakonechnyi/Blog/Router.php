<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog;

use Nakonechnyi\Blog\Controller\Category;
use Nakonechnyi\Blog\Controller\Post;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private Model\Category\Repository $categoryRepository;

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Blog\Model\Category\Repository $categoryRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category',$category);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post',$data);
            return Post::class;
        }

        return '';
    }
}
