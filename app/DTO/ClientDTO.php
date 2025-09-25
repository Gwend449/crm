<?php

namespace App\DTO;

use App\Traits\Arrayable;
use App\Traits\FromRequestable;
use ReflectionClass;

class ClientDTO
{
    use Arrayable, FromRequestable;

    public function __construct(
       public readonly string $name,
       public readonly string $email,
       public readonly ?string $car_model = null,
    ) {}
}
