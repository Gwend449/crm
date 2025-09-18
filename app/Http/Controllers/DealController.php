<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Client;
use App\Services\DealService;
use App\Services\ClientService;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DealService $dealService)
    {
        $dealService->getAll();
        return view('deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, DealService $dealService)
    {
        return view('deals.create', compact('clients', 'selectedClient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DealService $dealService)
    {
        $rules = [
            'date' => 'required|date|after:today',
            'client_id' => 'required|exists:clients,id',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'comment' => 'nullable|string|max:255',
        ];
        $rules['status'] = 'new';

        $validated = $request->validate($rules);
        $dealService->store($validated);

        return redirect()->route('deals.index')
            ->with('success', 'Deal created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        return view('clients.show', compact($deal));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        return view('deals.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal, DealService $dealService)
    {
        $rules = [
            'date' => 'required|date|after:today',
            'client_id' => 'required|exists:clients,id',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'comment' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);
        $dealService->update($deal, $validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal, DealService $dealService)
    {
        if($dealService->find($deal->id))
        {
            $dealService->delete($deal);
        } else {return redirect()->route('deals.index')->with('error', 'Deal deletion error');}

        return redirect()->route('deals.index')->with('success', 'Deal was deleted');
    }
}
