<?php

namespace App\DTO;

class DealDTO
{
    public function __construct(
        int $id, string $name
    )
    {}

    public static function fromRequest($request): self
    {
        return new self(
            $request->input('id'),
            $request->input('name'),
        );
    }
}
