<?php

declare(strict_types=1);

namespace App\Entity;

final class Card
{
    private int $id;
    private string $card_holder;
    private string $ch_name;
    private string $ch_email;
    private string $ch_phone_number;
    private string $ch_address;
    private string $ch_city;
    private string $ch_state;
    private string $ch_postal_code;
    private string $ch_country;
    private string $card_id;

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCardField($field): string
    {
        return $this->$field;
    }

    public function updateCardField(string $field, string $value): self
    {
        $this->$field = $value;

        return $this;
    }

}
