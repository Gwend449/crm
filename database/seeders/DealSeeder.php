<?php

namespace Database\Seeders;
use App\Models\Client;
use App\Models\Deal;

use App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if no clients, create ten
        if (Client::count() === 0) {
            Client::factory(10)->create();
        }

        Client::WhereDoesntHave('deals')->each(function ($client) {
            Deal::factory()->create(['client_id' => $client->id]);
        });
    }
}
