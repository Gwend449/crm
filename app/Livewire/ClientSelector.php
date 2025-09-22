<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
class ClientSelector extends Component
{
    public $clients;
    public $selectedClientId;
    public $carModel = '';

    public function mount($selectedClientId = null)
    {
        $this->clients = Client::all();

        if ($selectedClientId) {
            $this->selectedClientId = $selectedClientId;
            $this->carModel = Client::find($selectedClientId)?->car_model;
        }
    }

    public function updatedSelectedClientId($clientId)
    {
        logger('selected client: ', [$clientId]);
        $this->carModel = $clientId ? Client::find($clientId)?->car_model : '';
    }
    public function render()
    {
        return view('livewire.client-selector');
    }
}
