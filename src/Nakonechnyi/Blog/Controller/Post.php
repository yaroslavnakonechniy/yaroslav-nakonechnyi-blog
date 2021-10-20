<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Controller;

use Nakonechnyi\Framework\Http\ControllerInterface;

class Post implements ControllerInterface
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

    public function execute(): string
    {
        $data = $this->request->getParameter('post');
        $page = 'post.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}
