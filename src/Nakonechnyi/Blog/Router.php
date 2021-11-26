<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog;

use Nakonechnyi\Blog\Controller\Category;
use Nakonechnyi\Blog\Controller\Post;
use Nakonechnyi\Blog\Controller\Author;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private Model\Category\Repository $categoryRepository;

    private Model\Post\Repository $postRepository;

    private Model\Author\Repository $authorRepository;

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     * @param Model\Post\Repository $postRepository
     * @param Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Blog\Model\Category\Repository $categoryRepository,
        \Nakonechnyi\Blog\Model\Post\Repository $postRepository,
        \Nakonechnyi\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
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

        if ($author = $this->authorRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('author', $author);
            return Author::class;
        }

        return '';
    }
}
