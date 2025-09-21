<?php

namespace App\DTO;

use Symfony\Component\Mime\Part\Multipart\RelatedPart;

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
}
