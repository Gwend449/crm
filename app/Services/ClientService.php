<?php

namespace App\Services;

use App\Models\Client;
use App\DTO\ClientDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ClientService
{

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
        return Client::create($dto->toArray());
    }

    public function update($id, ClientDTO $dto): ?Client
    {
        $client = Client::find($id);

        if (!$client) {
            throw new ModelNotFoundException("Client with {$id} not found");
        }

        $client->fill($dto->toArray());
        $client->update();

        return $client;
    }

    public function delete(Client $client)
    {
        return $client->delete();
    }
}
