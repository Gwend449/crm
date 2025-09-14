<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $name = [
            'Александр Иванов',
            'Алексей Смирнов',
            'Андрей Кузнецов',
            'Артем Попов',
            'Владимир Петров',
            'Дмитрий Федоров',
            'Евгений Волков',
            'Иван Алексеев',
            'Максим Лебедев',
            'Михаил Семенов',
            'Николай Егоров',
            'Сергей Павлов',
            'Анна Козлова',
            'Елена Николаева',
            'Ирина Рысева',
            'Мария Боброва',
            'Наталья Богданова',
            'Ольга Серова',
            'Светлана Герасимова',
            'Татьяна Козлова'
        ];

         $carModels = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Land Cruiser', 'Highlander'],
            'BMW' => ['X5', 'X3', '5 Series', '3 Series', '7 Series'],
            'Mercedes-Benz' => ['E-Class', 'C-Class', 'S-Class', 'GLE', 'GLC'],
            'Audi' => ['A6', 'A4', 'Q7', 'Q5', 'A8'],
            'Lexus' => ['RX', 'NX', 'ES', 'LS', 'GX'],
            'Volkswagen' => ['Tiguan', 'Passat', 'Polo', 'Golf', 'T-Roc'],
            'Hyundai' => ['Tucson', 'Santa Fe', 'Sonata', 'Elantra', 'Palisade'],
            'Kia' => ['Sportage', 'Sorento', 'Optima', 'Rio', 'Telluride'],
            'Nissan' => ['X-Trail', 'Qashqai', 'Teana', 'Murano', 'Patrol'],
            'Mazda' => ['CX-5', 'CX-9', '6', '3', 'CX-30'],
            'Honda' => ['CR-V', 'Pilot', 'Accord', 'Civic', 'HR-V'],
            'Ford' => ['Explorer', 'Focus', 'Mustang', 'Edge', 'Escape'],
            'Chevrolet' => ['Tahoe', 'Equinox', 'Malibu', 'Traverse', 'Silverado'],
            'Skoda' => ['Kodiaq', 'Octavia', 'Superb', 'Karoq', 'Rapid'],
            'Renault' => ['Duster', 'Kaptur', 'Logan', 'Sandero', 'Arkana']
        ];

        $brand = array_rand($carModels);
        $car = $this->faker->randomElement($carModels[$brand]);

        return [
            'name' => $this->faker->randomElement($name),
            'email' => $this->faker->unique()->safeEmail,
            'car_model' => $brand . ' ' . $car,
        ];
    }
}
