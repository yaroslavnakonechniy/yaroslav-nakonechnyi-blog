<?php

declare(strict_types=1);

namespace Nakonechnyi\Cms\Controller;

class Page implements \Nakonechnyi\Framework\Http\ControllerInterface
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

        $page = $this->request->getParameter('page') . '.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}

