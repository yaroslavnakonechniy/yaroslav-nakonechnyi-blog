#!/usr/bin/env php
<?php

declare(strict_types=1);

try {
    require_once  __DIR__ . '/../src/bootstrap.php';
    /** @var \DI\Container $container */
    /** @var \Symfony\Component\Console\Application $application */
    $application = $container->get(\Symfony\Component\Console\Application::class);
    $application->add($container->get(\Nakonechnyi\Install\Command\GenerateData::class));
    $application->run();
    exit(0);
} catch (\Throwable $e) {
    echo "{$e->getMessage()} in file {$e->getFile()} at line {$e->getLine()}";
    exit(1);
}
