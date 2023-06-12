<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenseggers\Mongodb\Casts\BaseCast;

class VarJson implements CastsAttributes
{
    /**
     * Cast JSON variables and variable JSON to arrays
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $variables = json_decode($value, true);
        return $variables;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        

        return json_encode($value);

    }
}
