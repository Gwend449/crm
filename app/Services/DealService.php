<?php

namespace App\Services;

use App\Models\Deal;
use App\DTO\DealDTO;
use Illuminate\Database\Eloquent\Builder;

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

    public function getSortedDeals(array $filters)
    {
        $query = Deal::query()->with('client');

        if (!empty($filters['search'])) {
            $query->whereHas('client', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        $field = $filters['sortField'] ?? 'id';
        $direction = strtolower($filters['sortDirection'] ?? 'asc');

        if (in_array($direction, ['asc', 'desc'])) {
            $query->orderBy($field, $direction);
        }

        if ($field === 'client_name') {
            $query->orderByRelation('client', 'name', $direction);
        } else {
            $query->orderBy($field, $direction);
        }

        return $query->paginate(10)->withQueryString();
    }
}
