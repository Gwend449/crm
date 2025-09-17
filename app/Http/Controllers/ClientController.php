<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // public function __construct(
    //     protected ClientService $clientService)
    // {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
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
    public function store(Request $request, ClientService $clientService)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:20|unique:clients,email',
            'car_model' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);
        $clientService->store($validated);

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
    public function update(Request $request, Client $client, ClientService $clientService)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:20|unique:clients,email'.$client->id,
            'car_model' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);
        $clientService->update($client, $validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, ClientService $clientService)
    {
        if($clientService->find($client->id))
        {
            $clientService->delete($client);
        } else { return redirect()->route('clients.index')->with('error', 'Client deletion error');}

        return redirect()->route('clients.index')->with('success', 'Client deleted');
    }
}
