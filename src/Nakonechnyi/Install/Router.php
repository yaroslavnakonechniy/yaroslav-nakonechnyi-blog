<?php

declare(strict_types=1);

namespace Nakonechnyi\Install;

use Nakonechnyi\Install\Controller\Index;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
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

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($this->request->getRequestUrl() === 'install') {
            return Index::class;
        }

        return '';
    }
}
