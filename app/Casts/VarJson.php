<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

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
        foreach ($variables as $variable_name=>$variable_json_properties){
            json_decode($variable_json_properties, true);
            $variables[$variable_name] = $variable_json_properties;
        }
        return json_encode($variables);
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
