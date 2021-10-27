<?php
declare(strict_types=1);

namespace Nakonechnyi\Framework\View;

use Nakonechnyi\Framework\Http\Response\Html;

class PageResponse extends Html
{
    private \Nakonechnyi\Framework\View\Renderer $renderer;

    /**
     * @param \Nakonechnyi\Framework\View\Renderer $renderer
     */
    public function __construct(
        \Nakonechnyi\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlockClass
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass, $template));
    }
}
