<?php

namespace App\Services;

use App\Models\Client;
use App\DTO\ClientDTO;
use App\Mappers\ClientMapper;

class ClientService {

    public function getAllClients()
    {
        return Client::paginate(10);
    }

    public function find(int $id): ?Client
    {
        return Client::find($id);
    }
    public function store(ClientDTO $dto): Client
    {
        $client = ClientMapper::toModel($dto);
        $client->save();

        return $client;
    }

    public function update(Client $client, ClientDTO $dto)
    {
        $client = ClientMapper::updateModel($client, $dto);
        $client->update();

        return $client;
    }

    public function delete(Client $client)
    {
        return $client->delete();
    }
}
