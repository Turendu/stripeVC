<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Card;

final class IssuingRepository extends BaseRepository
{

    public function getCardholder(string $cardholderId): Card
    {
        $query = 'SELECT * FROM `cards` WHERE `card_holder` = :cardholder';
        $statement = $this->database->prepare($query);
        $statement->bindParam('cardholder', $cardholderId);
        $statement->execute();
        $cardholder = $statement->fetchObject(Card::class);
        if (! $cardholder) {
            throw new \App\Exception\Issuing('Cardholder not found.', 404);
        }

        return $cardholder;
    }

    public function storeCardholder(array $input): void
    {
        $query = '
            INSERT INTO `cards`
                (`card_holder`, `ch_name`, `ch_email`, `ch_phone_number`, `ch_address`, `ch_city`, `ch_state`, `ch_postal_code`, `ch_country`, `card_id`)
            VALUES
                (:card_holder, :name, :email, :phone_number, :address, :city, :state, :postal_code, :country, :card_id)
        ';
        $statement = $this->database->prepare($query);
        $statement->bindParam('card_holder', $input['card_holder']);
        $statement->bindParam('name', $input['name']);
        $statement->bindParam('email', $input['email']);
        $statement->bindParam('phone_number', $input['phone_number']);
        $statement->bindParam('address', $input['line1']);
        $statement->bindParam('city', $input['city']);
        $statement->bindParam('state', $input['state']);
        $statement->bindParam('postal_code', $input['postal_code']);
        $statement->bindParam('country', $input['country']);
        $statement->bindParam('card_id', $input['card_id']);
        $done = $statement->execute();

        if ( !$done ) {
            echo 'send admin notification [' . $input['card_holder'] . ']';
        }
    }

    public function updateCardholder(string $carholderId, array $input): void
    {
        $card = $this->getCardholder($carholderId);
        $data = json_decode((string) json_encode($input), false);

        if (isset($data->card_holder)) { $card->updateCardField('card_holder', $data->card_holder); }
        if (isset($data->ch_name)) { $card->updateCardField('ch_name', $data->ch_name); }
        if (isset($data->ch_email)) { $card->updateCardField('ch_email', $data->ch_email); }
        if (isset($data->ch_phone_number)) { $card->updateCardField('ch_phone_number', $data->ch_phone_number); }
        if (isset($data->ch_address)) { $card->updateCardField('ch_address', $data->ch_address); }
        if (isset($data->ch_city)) { $card->updateCardField('ch_city', $data->ch_city); }
        if (isset($data->ch_state)) { $card->updateCardField('ch_state', $data->ch_state); }
        if (isset($data->ch_postal_code)) { $card->updateCardField('ch_postal_code', $data->ch_postal_code); }
        if (isset($data->ch_country)) { $card->updateCardField('ch_country', $data->ch_country); }
        if (isset($data->card_id)) { $card->updateCardField('card_id', $data->card_id); }

        $id         = $card->getId();
        $cardHolder = $card->getCardField('card_holder');
        $chName     = $card->getCardField('ch_name');
        $chEmail    = $card->getCardField('ch_email');
        $chPhone    = $card->getCardField('ch_phone_number');
        $chAddress  = $card->getCardField('ch_address');
        $chCity     = $card->getCardField('ch_city');
        $chState    = $card->getCardField('ch_state');
        $chZip      = $card->getCardField('ch_postal_code');
        $chCountry  = $card->getCardField('ch_country');
        $cardId     = $card->getCardField('card_id');

        $query = '
            UPDATE `cards` SET 
            `card_holder` = :card_holder,
            `ch_name` = :name,
            `ch_email` = :email,
            `ch_phone_number` = :phone_number,
            `ch_address` = :address,
            `ch_city` = :city,
            `ch_state` = :state,
            `ch_postal_code` = :postal_code,
            `ch_country` = :country,
            `card_id` = :card_id
            WHERE `id` = :id
        ';

        $statement = $this->database->prepare($query);
        $statement->bindParam('id', $id);
        $statement->bindParam('card_holder', $cardHolder);
        $statement->bindParam('name', $chName);
        $statement->bindParam('email', $chEmail);
        $statement->bindParam('phone_number', $chPhone);
        $statement->bindParam('address', $chAddress);
        $statement->bindParam('city', $chCity);
        $statement->bindParam('state', $chState);
        $statement->bindParam('postal_code', $chZip);
        $statement->bindParam('country', $chCountry);
        $statement->bindParam('card_id', $cardId);
        $done = $statement->execute();

        if ( !$done ) {
            echo 'send admin notification [' . $input['card_holder'] . ']';
        }

    }

}