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

    public function findClient(int $id): ?Client
    {
        return Client::findOrFail($id);
    }
    public function storeClient(ClientDTO $dto): Client
    {
        return Client::create($dto->toArray());
    }

    public function updateClient(int $id, ClientDTO $dto): ?Client
    {
        $client = Client::findOrFail($id);

        $client->fill($dto->toArray());
        $client->update();

        return $client;
    }

    public function deleteClient(Client $client)
    {
        return $client->delete();
    }
}
