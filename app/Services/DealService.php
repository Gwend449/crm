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
        return Deal::find($id);
    }
    public function store(DealDTO $dto): Deal
    {
        return Deal::create($dto->toArray());
    }

    public function update($id, DealDTO $dto): Deal
    {
         $deal = Deal::find($id);

       if (!$deal) {
            throw new ModelNotFoundException("Deal with {$id} not found");
        }

        $deal->fill($dto->toArray());
        $deal->update();

        return $deal;
    }

    public function delete(Deal $deal)
    {
        return $deal->delete();
    }
}
