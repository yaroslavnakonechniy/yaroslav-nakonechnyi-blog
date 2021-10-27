<?php

declare(strict_types=1);

namespace Nakonechnyi\ContactUs\Controller;

use Nakonechnyi\Framework\Http\ControllerInterface;
use Nakonechnyi\Framework\Http\Response\Raw;
use Nakonechnyi\Framework\View\Block;

class Form implements ControllerInterface
{
    private \Nakonechnyi\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Nakonechnyi\Framework\View\PageResponse $pageResponse
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
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Nakonechnyi/ContactUs/view/contact-us.php'
        );
    }
}
