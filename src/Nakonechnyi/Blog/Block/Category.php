<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Block;

use Nakonechnyi\Blog\Model\Category\Entity as CategoryEntity;
use Nakonechnyi\Blog\Model\Post\Entity as PostEntity;

class Category extends \Nakonechnyi\Framework\View\Block
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private \Nakonechnyi\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/Nakonechnyi/Blog/view/category.php';

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     * @param \Nakonechnyi\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
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
}
