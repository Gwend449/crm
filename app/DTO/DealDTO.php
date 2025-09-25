<?php

namespace App\DTO;

use DateTime;
use App\Traits\Arrayable;
use App\Traits\FromRequestable;
class DealDTO
{
    use Arrayable, FromRequestable;

    public function __construct(
        public int $client_id,
        public string $service_name,
        public float $price,
        public ?string $comment,
        public DateTime $date,
        public ?string $status,
    )
    {}
}
