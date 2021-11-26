<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Block;

use Nakonechnyi\Blog\Model\Author\Entity as AuthorEntity;
use Nakonechnyi\Blog\Model\Post\Entity as PostEntity;

class Author extends \Nakonechnyi\Framework\View\Block
{
    private \Nakonechnyi\Framework\Http\Request $request;
    private \Nakonechnyi\Blog\Model\Post\Repository $postRepository;
    private \Nakonechnyi\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Nakonechnyi/Blog/view/author.php';

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
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }
    /**
     * @return PostEntity[]
     */
    public function getAuthorPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getAuthor()->getPosts()
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
