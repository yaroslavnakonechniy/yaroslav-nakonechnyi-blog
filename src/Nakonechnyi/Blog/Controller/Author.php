<?php
declare(strict_types=1);

namespace Nakonechnyi\Blog\Controller;

use Nakonechnyi\Framework\Http\Response\Raw;

class Author implements \Nakonechnyi\Framework\Http\ControllerInterface
{
    private \Nakonechnyi\Framework\View\PageResponse $pageResponse;
    /**
     *  @param \Nakonechnyi\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Nakonechnyi\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }
    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(\Nakonechnyi\Blog\Block\Author::class);
    }
}
