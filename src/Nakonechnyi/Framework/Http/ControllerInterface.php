<?php

declare(strict_types=1);

namespace Nakonechnyi\Framework\Http;

interface ControllerInterface
{
    public function execute(): string;
}
