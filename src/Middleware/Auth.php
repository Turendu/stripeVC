<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Route;

final class Auth extends Base
{
    public function __invoke(
        Request $request,
        Response $response,
        Route $next
    ): ResponseInterface {
        $jwtHeader = $request->getHeaderLine('Authorization');
        if (! $jwtHeader) {
            throw new \App\Exception\Auth('Unauthorized', 401);
        }
        $jwt = explode('Bearer ', $jwtHeader);
        if (! isset($jwt[1])) {
            throw new \App\Exception\Auth('Invalid authentication', 401);
        }
        $decoded = $this->checkToken($jwt[1]);
        $object = (array) $request->getParsedBody();
        $object['decoded'] = $decoded;

        return $next($request->withParsedBody($object), $response);
    }
}
