<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;
use Psr\Http\Server\RequestHandlerInterface;

class Error404Controller implements RequestHandlerInterface
{
    public function handle(): void
    {
        http_response_code(404);
    }
}
