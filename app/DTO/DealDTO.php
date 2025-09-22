<?php

namespace App\DTO;

use DateTime;

class DealDTO
{
    public function __construct(
        public int $client_id,
        public string $service_name,
        public float $price,
        public ?string $comment,
        public DateTime $date,
        public ?string $status,
    )
    {}

    public static function fromRequest($request): self
    {
        return new self(
            (int) $request->input('client_id'),
            $request->input('service_name'),
            (float) $request->input('price'),
            $request->input('comment'),
            new DateTime($request->input('date')),
            $request->input('status'),
        );
    }

    public function toArray(): array
    {
        return [
            'client_id' => $this->client_id,
            'service_name' => $this->service_name,
            'price' => $this->price,
            'comment' => $this->comment,
            'date' => $this->date,
            'status' => $this->status,
        ];
    }
}
