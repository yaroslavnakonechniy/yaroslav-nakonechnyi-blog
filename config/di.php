<?php

declare(strict_types=1);

return [
    \Nakonechnyi\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Nakonechnyi\Cms\Router::class),
            \DI\get(\Nakonechnyi\Blog\Router::class),
            \DI\get(\Nakonechnyi\ContactUs\Router::class),
        ]
    )
];
