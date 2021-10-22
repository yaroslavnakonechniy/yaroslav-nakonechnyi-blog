<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Block;

use Nakonechnyi\Blog\Model\Category\Entity as CategoryEntity;

class CategoryList extends \Nakonechnyi\Framework\View\Block
{
    private \Nakonechnyi\Blog\Model\Category\Repository $categoryRepository;

    protected string $template = '../src/Nakonechnyi/Blog/view/category_list.php';

    /**
     * @param \Nakonechnyi\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(\Nakonechnyi\Blog\Model\Category\Repository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return CategoryEntity[]
     */
    public function getCategories(): array
    {
        return $this->categoryRepository->getList();
    }
}
