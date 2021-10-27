<?php

declare(strict_types=1);

namespace Nakonechnyi\Framework\Http;

use Nakonechnyi\Framework\Http\Response\Raw;

interface ControllerInterface
{
    public function execute(): Raw;
}
