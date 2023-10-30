<?php

declare(strict_types=1);

namespace App\Service\Issuing;

final class AddFunds extends Base
{

    public function activateCard(string $cardId): object
    {

        return $this->stripeActivateCard($cardId);

    }

    public function updateCardFound(array $input): object
    {

        return $this->stripe->issuing->cards->update(
            $input['card_id'],
            [
                'spending_controls' => [
                    'spending_limits' => [
                        [
                            'amount' => $input['amount'], 
                            'interval' => $input['interval']
                        ],
                    ],
                ],
            ]
        );

    }

}
