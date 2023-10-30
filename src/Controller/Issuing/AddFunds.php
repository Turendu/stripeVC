<?php

declare(strict_types=1);

namespace App\Controller\Issuing;

use Slim\Http\Request;
use Slim\Http\Response;

final class AddFunds extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $input = (array) $request->getParsedBody();

        $status =  $this->getAddFundsService()->activateCard($input['card_id']);

        $show = $status;

        if( isset($status->status) && $status->status == "active") {

            $updateCard = $this->getAddFundsService()->updateCardFound($input);

        }

        return $this->jsonResponse($response, 'success', $updateCard, 200);
    }

}   