<?php

declare(strict_types=1);

use Nakonechnyi\Framework\Database\Adapter\MySQL;

return [
    \Nakonechnyi\Framework\Database\Adapter\AdapterInterface::class => DI\get(
        MySQL::class
    ),
    MySQL::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            MySQL::DB_NAME     => 'yaroslav_nakonechnyi_blog',
            MySQL::DB_USER     => 'yaroslav_nakonechnyi_blog_user',
            MySQL::DB_PASSWORD => '45Ya!$""sT&P*C%RNSEhr',
            MySQL::DB_HOST     => 'mysql',
            MySQL::DB_PORT     => '3306'
        ]
    ),
    \Nakonechnyi\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Nakonechnyi\Cms\Router::class),
            \DI\get(\Nakonechnyi\Blog\Router::class),
            \DI\get(\Nakonechnyi\ContactUs\Router::class),
            \DI\get(\Nakonechnyi\Install\Router::class)
        ]
    )
];
