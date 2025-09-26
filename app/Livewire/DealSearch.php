<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\DealService;

class DealSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    protected $updatesQueryString = ['search', 'status', 'sortField', 'sortDirection'];

    protected $dealService;

    public function mount()
    {
        $this->dealService = new DealService();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->sortField = 'id';
        $this->sortDirection = 'asc';
        $this->resetPage();
    }

    public function render()
    {
        $deals = (new DealService())->getSortedDeals([
            'search' => $this->search,
            'status' => $this->status,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
        ]);

        return view('livewire.deal-search', compact('deals'));
    }
}
