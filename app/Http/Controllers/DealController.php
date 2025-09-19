<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealRequest;
use App\Http\Requests\UpdateDealRequest;
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
    public function index()
    {
        $deals = Deal::get();
        return view('deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('deals.create', compact('clients', 'selectedClient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDealRequest $request, DealService $dealService)
    {
        $dealService->store($request->validated());

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
    public function update(UpdateDealRequest $request, Deal $deal, DealService $dealService)
    {
        $dealService->update($deal, $request->validated());

        return redirect('deals.index')->with('success', 'Deal was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal, DealService $dealService)
    {
        if ($dealService->find($deal->id)) {
            $dealService->delete($deal);
            return redirect()->route('deals.index')->with('success', 'Deal was deleted');
        }
    }
}
