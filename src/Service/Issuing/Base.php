<?php

declare(strict_types=1);

namespace App\Service\Issuing;

use App\Entity\Card;
use App\Repository\IssuingRepository;
use App\Service\BaseService;

abstract class Base extends BaseService
{

    protected IssuingRepository $issuingRepository;

    protected $stripe;

    public function __construct(
        issuingRepository $issuingRepository
    ) {
        $this->issuingRepository = $issuingRepository;
        $stripe = new \Stripe\StripeClient('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
        //$stripe = new \Stripe\StripeClient('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');
        $this->stripe = $stripe;
    }

    protected function retriveCard(string $cardId): object
    {

        return $this->stripe->issuing->cards->retrieve(
            $cardId,
            ['expand' => ['number', 'cvc']]
        );
    }

    protected function stripeActivateCard(string $cardId): object
    {
        
        return $this->stripe->issuing->cards->update(
                $cardId,
                ['status' => 'active']
            );
    }

}
