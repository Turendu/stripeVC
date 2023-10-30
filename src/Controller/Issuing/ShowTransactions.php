<?php

declare(strict_types=1);

namespace App\Controller\Issuing;

use Slim\Http\Request;
use Slim\Http\Response;

final class ShowTransactions extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $input = (array) $request->getParsedBody();

        $cardTransactions =  $this->getShowTransactionsService()->showCardTransactions($input);

        return $this->jsonResponse($response, 'success', $cardTransactions, 200);
    }

}   