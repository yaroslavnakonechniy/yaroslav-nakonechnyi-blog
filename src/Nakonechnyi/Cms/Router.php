<?php

declare(strict_types=1);

namespace Nakonechnyi\Cms;

use Nakonechnyi\Cms\Controller\Page;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === '') {
            return Page::class;
        }

        return '';
    }

}
