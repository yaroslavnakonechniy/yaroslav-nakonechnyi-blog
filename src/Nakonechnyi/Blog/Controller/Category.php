<?php

declare(strict_types=1);

namespace Nakonechnyi\Blog\Controller;

use Nakonechnyi\Framework\Http\ControllerInterface;

class Category implements ControllerInterface
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

    public function execute(): string
    {
        return (string) $this->renderer->setContent(\Nakonechnyi\Blog\Block\Category::class);

    }
}
