<?php

namespace App\Services;

use App\Models\Deal;

class DealService {

    public function getAll()
    {
        return Deal::all();
    }

    public function find(int $id): ?Deal
    {
        return Deal::find($id);
    }
    public function store(array $data): Deal
    {
        return Deal::create($data);
    }

    public function update(Deal $deal, array $data)
    {
        return $deal->update($data);
    }

    public function delete(Deal $deal)
    {
        return $deal->delete();
    }
}
