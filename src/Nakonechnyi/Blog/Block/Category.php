<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Block;

use Nakonechnyi\Blog\Model\Category\Entity as CategoryEntity;
use Nakonechnyi\Blog\Model\Post\Entity as PostEntity;
use Nakonechnyi\Blog\Model\Author\Entity as AuthorEntity;

class Category extends \Nakonechnyi\Framework\View\Block
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private \Nakonechnyi\Blog\Model\Post\Repository $postRepository;

    private \Nakonechnyi\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Nakonechnyi/Blog/view/category.php';

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     * @param \Nakonechnyi\Blog\Model\Post\Repository $postRepository
     * @param \Nakonechnyi\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Blog\Model\Post\Repository $postRepository,
        \Nakonechnyi\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return CategoryEntity
     */
    public function getCategory(): CategoryEntity
    {
        return $this->request->getParameter('category');
    }

    /**
     * @return PostEntity[]
     */
    public function getCategoryPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getCategory()->getPostIds()
        );
    }

    /**
     * @param int $authorId
     * @return AuthorEntity
     */
    public function getPostAuthor(int $authorId): AuthorEntity
    {
        return $this->authorRepository->getAuthorById($authorId);
    }
}
