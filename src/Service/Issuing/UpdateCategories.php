<?php

declare(strict_types=1);

namespace App\Service\Issuing;

final class UpdateCategories extends Base
{

    public function updateCardCategories(array $input): object
    {
        $action = $input["action"] . "_categories";

        return $this->stripe->issuing->cards->update(
            $input['card_id'],
            [
                'spending_controls' => [
                    $action =>  $input['categories']
                ],
            ]
        );

    }

}