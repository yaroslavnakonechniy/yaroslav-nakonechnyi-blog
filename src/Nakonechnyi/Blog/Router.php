<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog;

use Nakonechnyi\Blog\Controller\Category;
use Nakonechnyi\Blog\Controller\Post;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private Model\Category\Repository $categoryRepository;

    private Model\Post\Repository $postRepository;

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     * @param Model\Post\Repository $postRepository
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Blog\Model\Category\Repository $categoryRepository,
        \Nakonechnyi\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category',$category);
            return Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post',$post);
            return Post::class;
        }

        return '';
    }
}
