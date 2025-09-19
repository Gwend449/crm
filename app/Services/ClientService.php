<?php

namespace App\Services;

use App\Models\Client;

class ClientService {

    public function getAllClients()
    {
        return Client::simplePaginate(10);
    }

    public function find(int $id): ?Client
    {
        return Client::find($id);
    }
    public function store(array $data): Client
    {
        return Client::create($data);
    }

    public function update(Client $client, array $data)
    {
        return $client->update($data);
    }

    public function delete(Client $client)
    {

    }
}
