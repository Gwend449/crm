<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealRequest;
use App\Http\Requests\UpdateDealRequest;
use App\Models\Deal;
use App\Models\Client;
use App\Services\DealService;
use App\DTO\DealDTO;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DealService $dealService)
    {
        $deals = $dealService->getAllDeals();
        return view('deals.index', ['deals' => $deals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Deal $deal)
    {
        return view('deals.create', ['deals' => $deal]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDealRequest $request, DealService $dealService)
    {
        $dto = DealDTO::fromRequest($request);
        $dealService->storeDeal($dto);

        return redirect()->route('deals.index')
            ->with('success', 'Deal created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        return view('deals.show', ['deal' => $deal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal, Client $client)
    {
        return view('deals.edit', ['deals' => $deal, 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDealRequest $request, Deal $deal, DealService $dealService)
    {
        $dealService->updateDeal($deal, $request->validated());

        return redirect('deals.index')->with('success', 'Deal was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal, DealService $dealService)
    {
        if ($dealService->find($deal->id)) {
            $dealService->deleteDeal($deal);
            return redirect()->route('deals.index')->with('success', 'Deal was deleted');
        }
    }
}
