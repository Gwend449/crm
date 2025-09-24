<?php

namespace App\Traits;

use ReflectionClass;

trait Arrayable
{
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $props = $reflection->getProperties();

        $array = [];
        foreach ($props as $prop) {
            $name = $prop->getName();
            $array[$name] = $prop->getValue($this);
        }

        return $array;
    }
}
