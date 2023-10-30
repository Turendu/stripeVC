<?php

declare(strict_types=1);

namespace App\Service\Issuing;

final class CreateCard extends Base
{
    
    public function createCardHolder(array $input): object
    {

        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
       
        $cardholder = \Stripe\Issuing\Cardholder::create([

        'name'          =>  $input['name'],
        'email'         =>  $input['email'],
        'phone_number'  =>  $input['phone_number'],
        'status'        => 'active',
        'type'          => 'individual',
        'billing'       => [
            'address'           => [
                'line1'         => $input['line1'],
                'city'          => $input['city'],
                'state'         => $input['state'],
                'postal_code'   => $input['postal_code'],
                'country'       => $input['country'],
                ],
            ],
        ]);

        $input['card_holder'] = $cardholder->id;
        $input['card_id']     = 'empty';

        $this->issuingRepository->storeCardholder($input);

        return $cardholder;

    }

    public function createCard(object $cardholder): object
    {

        $card = $this->stripe->issuing->cards->create(
            [
                'cardholder' => $cardholder,
                'currency' => 'usd',
                'type' => 'virtual',
            ]
        );

        $carholderId = $cardholder->id;
        $input       = ['card_id' => $card->id];

        $this->issuingRepository->updateCardholder($carholderId, $input);

        return $card;

    }

    public function retriveCardData(string $cardId): object
    {

        return $this->retriveCard($cardId);

    }

}
