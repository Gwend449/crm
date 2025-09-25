<?php

namespace App\Traits;

use ReflectionClass;
use Illuminate\Http\Request;

trait FromRequestable
{
    public static function fromRequest(Request $request): static
    {
        $reflection = new ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();
        $params = $constructor->getParameters();

        $array = [];

        foreach ($params as $param) {
            $name = $param->getName();
            $type = $param->getType();
            $value = $request->input($name);

            switch ($type) {
                case \DateTime::class:
                    $value = $value ? new \DateTime($value) : null;
                    break;
            default:
            }

            $array[] = $value;
        }

        return new static(...$array);
    }
}
