<?php

namespace App\Services;

use App\Models\Deal;
use App\DTO\DealDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DealService
{

    public function getAllDeals()
    {
        return Deal::paginate(10);
    }

    public function find(int $id): ?Deal
    {
        return Deal::findOrFail($id);
    }
    public function storeDeal(DealDTO $dto): Deal
    {
        return Deal::create($dto->toArray());
    }

    public function updateDeal($id, DealDTO $dto): Deal
    {
        $deal = Deal::findOrFail($id);

        $deal->fill($dto->toArray());
        $deal->update();

        return $deal;
    }

    public function deleteDeal(Deal $deal)
    {
        return $deal->delete();
    }
}
