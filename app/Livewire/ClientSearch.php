<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;
use App\Services\ClientService;

class ClientSearch extends Component
{
    use WithPagination;

        public $search = '';
        public $sort = '';

    protected $updatesQueryString = ['search', 'sort'];

    public function mount()
    {
        $this->clientService = new ClientService();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->sort = '';
        $this->resetPage();
    }

    public function render()
    {
        $clients = (new ClientService())->getSortedClients([
            'name' => $this->search,
            'sort' => $this->sort,
        ]);

        return view('livewire.client-search', ['clients' => $clients]);
    }

}
