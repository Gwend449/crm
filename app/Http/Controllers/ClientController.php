<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCLientRequest;
use App\Http\Requests\UpdateCLientRequest;
use App\Models\Client;
use App\Services\ClientService;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
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
    public function store(StoreCLientRequest $request, ClientService $clientService)
    {
        $clientService->store($request->validated());

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
    public function update(UpdateCLientRequest $request, Client $client, ClientService $clientService)
    {
        $clientService->update($client, $request->validated());

        return redirect()->route('clients.index')
            ->with('success', 'Client was updated');
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
