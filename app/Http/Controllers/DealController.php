<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Client;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::all();
        return view('deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $clients = Client::all();
        $selectedClient = null;

        if($request->has('client_id')) {
            $selectedClient = Client::find($request->client_id);
            // return redirect()->route('deals.create')->with('selected_client', $selectedClient)->withInput();
            session(['selected_client' => $selectedClient]);
        }

        return view('deals.create', compact('clients', 'selectedClient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|after:today',
            'client_id' => 'required|exists:clients,id',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'comment' => 'nullable|string|max:255',
        ]);

        $validated['status'] = 'new';

        Deal::create($validated);

        return redirect()->route('deals.index')->with('success', 'Deal created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        if (!$deal->exists()) {
            return redirect()->route('deals.index')->with('error', 'Deal was not deleted');
        }
        $deal->delete();
        return redirect()->route('deals.index')->with('success', 'Deal was deleted');
    }
}
