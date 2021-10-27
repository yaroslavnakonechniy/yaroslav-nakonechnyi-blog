<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Block;

use Nakonechnyi\Blog\Model\Post\Entity as PostEntity;

class Post extends \Nakonechnyi\Framework\View\Block
{
    private \Nakonechnyi\Framework\Http\Request $request;

    protected string $template = '../src/Nakonechnyi/Blog/view/post.php';

    /**
     * @param \Nakonechnyi\Framework\Http\Request $request
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }

}
