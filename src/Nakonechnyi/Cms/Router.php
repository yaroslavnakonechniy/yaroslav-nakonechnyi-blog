<?php

declare(strict_types=1);

namespace Nakonechnyi\Cms;

use Nakonechnyi\Cms\Controller\Page;

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
        $cmsPage = [
            '',
            'test-page',
            'test-page-2'
        ];

        if (in_array($requestUrl, $cmsPage)) {
            $this->request->setParameter('page', $requestUrl ?: 'home');

            return Page::class;
        }

        return '';
    }
}
