<?php

namespace App\Models;

use App\Casts\VarJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcPage extends Model
{
    use HasFactory;

    /** disable incrementing id to string*/
    public $incrementing = false;
    protected $keyType = 'string';

    /** Remove timestamp requirements */
    public $timestamps = false;

    /* Allows json casting into array */
    protected $casts = [
        'variables_json' => 'array',
    ];

    public function getVariablesJsonStringAttribute()
    {
        return json_encode($this->attributes['variables_json']);
    }
 
    protected $fillable = 
    [
        'id', 
        'variables_json', 
        'formula_description', 
        'formula_sympy', 
        'formula_name', 
        'topic', 
        'formula_latex'
    ];
        
}
