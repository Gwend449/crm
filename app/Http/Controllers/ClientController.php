<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCLientRequest;
use App\Http\Requests\UpdateCLientRequest;
use App\Mappers\ClientMapper;
use App\Models\Client;
use App\DTO\ClientDTO;
use App\Services\ClientService;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientService $clientsService)
    {
        $clients = $clientsService->getAllClients();
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request, ClientService $clientService)
    {
        $clientDTO = ClientDTO::fromRequest($request);
        $clientService->store($clientDTO);

        return redirect()->route('clients.index')
            ->with('success', 'Client added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client, ClientService $clientService)
    {
        $clientDTO = ClientDTO::fromRequest($request);
        $clientService->update($client, $clientDTO);

        return redirect()->route('clients.index')
            ->with('success', 'Client was updated');
    }

    public function getCar()
    {
        //$clientCar = Client::where('client_id', $client_id)->pluck('car_model', 'id');
        $client = Client::find('client_id');
        return response()->json(['car_model'=>$client->car_model]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, ClientService $clientService)
    {
        if ($clientService->find($client->id)) {
            $clientService->delete($client);
            return redirect()->route('clients.index')->with('success', 'Client deleted');
        }
    }
}
