<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();

try {
    $containerBuilder->addDefinitions('../config/di.php');
    $container = $containerBuilder->build();
    /** @var  \Nakonechnyi\Framework\Http\RequestDispatcher $requestDispatcher */
    $requestDispatcher = $container->get(\Nakonechnyi\Framework\Http\RequestDispatcher::class);
    $requestDispatcher->dispatch();
} catch (\Exception $e) {
    echo "{$e->getMessage()} in file {$e->getFile()} at line {$e->getLine()}";
    exit(1);
}
//
//$requestDispatcher = new \Nakonechnyi\Framework\Http\RequestDispatcher([
//    new \Nakonechnyi\Cms\Router(),
//    new \Nakonechnyi\Catalog\Router(),
//    new \Nakonechnyi\ContactUs\Router(),
//]);
//
//$requestDispatcher->dispatch();


exit;


switch ($requestUri) {

    default:
        if ($data = blogGetBlogByUrl($requestUri)) {
            $page = 'category.php';
            break;
        }

        if ($data = blogGetPostByUrl($requestUri)) {
            $page = 'post.php';
            break;
        }

        break;
}
