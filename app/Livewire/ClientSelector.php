<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
class ClientSelector extends Component
{
    public $clients;
    public $selectedClientId;
    public $carModel = '';

    public function mount()
    {
        $this->clients = Client::all();
    }

    public function updatedSelectedClientId($id)
    {
        $client = Client::find($id);
        $this->carModel = $client->car_model ?? '';
    }
    public function render()
    {
        return view('livewire.client-selector');
    }
}
