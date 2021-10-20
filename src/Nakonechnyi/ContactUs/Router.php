<?php

declare(strict_types=1);

namespace Nakonechnyi\ContactUs;

use Nakonechnyi\ContactUs\Controller\Form;

class Router implements \Nakonechnyi\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return Form::class;
        }

        return '';
    }

}

