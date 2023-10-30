<?php

declare(strict_types=1);

namespace App\Service\Issuing;

final class ShowTransactions extends Base
{

    public function showCardTransactions(array $input): object
    {

        return  $this->stripe->issuing->transactions->all([
            'card'  => $input['card_id'],
            'limit' => $input['limit']
        ]);

    }

}