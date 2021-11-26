<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Block;

use Nakonechnyi\Blog\Model\Post\Entity as PostEntity;
use Nakonechnyi\Blog\Model\Author\Entity as AuthorEntity;

class Post extends \Nakonechnyi\Framework\View\Block
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private \Nakonechnyi\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Nakonechnyi/Blog/view/post.php';

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }

    /**
     * @return AuthorEntity
     */
    public function getPostAuthor(): AuthorEntity
    {
        return $this->authorRepository->getAuthorById(
            $this->getPost()->getAuthorId()
        );
    }
}
