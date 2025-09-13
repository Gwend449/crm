<?php

namespace Database\Seeders;
use App\Models\Client;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Иван Петров',
                'email' => 'ivan@example.com',
                'car_model' => 'Toyota Land Cruiser',
            ],
            [
                'name' => 'Анна Сидорова',
                'email' => 'anna@example.com',
                'car_model' => 'BMW X5',
            ],
            [
                'name' => 'Сергей Иванов',
                'email' => 'sergey@example.com',
                'car_model' => 'Mercedes S-Class',
            ],
            [
                'name' => 'Елена Смирнова',
                'email' => 'elena@example.com',
                'car_model' => 'Lexus RX',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
