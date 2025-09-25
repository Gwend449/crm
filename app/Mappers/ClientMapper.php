<?php

namespace App\Mappers;

use App\DTO\ClientDTO;
use App\Models\Client;

class ClientMapper
{
    public static function toModel(ClientDTO $dto): Client
    {
        return new Client([
            'name' => $dto->name,
            'email' => $dto->email,
            'car_model' => $dto->car_model,
        ]);
    }

    public static function updateModel(Client $client, ClientDTO $dto): Client
    {
        $client->fill([
            'name' => $dto->name,
            'email' => $dto->email,
            'car_model' => $dto->car_model,
        ]);

        return $client;
    }
}
