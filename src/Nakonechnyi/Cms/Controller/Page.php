<?php

declare(strict_types=1);

namespace Nakonechnyi\Cms\Controller;

use Nakonechnyi\Framework\Http\Request;
use Nakonechnyi\Framework\Http\Response\Raw;
use Nakonechnyi\Framework\View\Block;

class Page implements \Nakonechnyi\Framework\Http\ControllerInterface
{
    private \Nakonechnyi\Framework\Http\Request $request;

    private \Nakonechnyi\Framework\View\PageResponse $pageResponse;

    /**
     * @param Request $request
     * @param \Nakonechnyi\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Nakonechnyi\Framework\Http\Request $request,
        \Nakonechnyi\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
    }

    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Nakonechnyi/Cms/view' . $this->request->getParameter('page') . '.php'
        );
    }
}
