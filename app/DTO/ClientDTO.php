<?php

namespace App\DTO;

class ClientDTO
{
    public function __construct(
       public readonly string $name,
       public readonly string $email,
       public readonly ?string $car_model = null,
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            $request->input('name'),
            $request->input('email'),
            $request->input('car_model') ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'car_model' => $this->car_model,
        ];
    }
}
