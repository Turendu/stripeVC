<?php

declare(strict_types=1);

namespace App\Controller\Issuing;

use Slim\Http\Request;
use Slim\Http\Response;

final class CreateCard extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $input = (array) $request->getParsedBody();

        $cardholder = $this->getCreateCardService()->createCardHolder($input);

        $card = $this->getCreateCardService()->createCard($cardholder);

        $cardId = $card->id;

        $cardData = $this->getCreateCardService()->retriveCardData($cardId);

        $show = array(
            "card" => array(
                'number'     => $cardData->number,
                'expiration' => (string)$cardData->exp_month . "/" . substr((string)$cardData->exp_year, -2),
                'cvc'        => $cardData->cvc,
                'status'     => $cardData->status
            )
        );

        return $this->jsonResponse($response, 'success', $show, 201);
    }
}