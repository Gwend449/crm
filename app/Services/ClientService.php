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

    public function updateClient(Client $client, ClientDTO $dto): ?Client
    {
        $client = Client::findOrFail($client->id);

        $client->fill($dto->toArray());
        $client->update();

        return $client;
    }

    public function getSortedClients(array $filters)
    {
        $query = Client::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['sort'])) {
            $query->orderBy('name', $filters['sort']);
        }

        return $query->paginate(10)->withQueryString();
    }

    public function deleteClient(Client $client)
    {
        return $client->delete();
    }
}
