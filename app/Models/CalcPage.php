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

    /* Allows casting into json array */
    protected $casts = [
        'variables_json' => 'array',
    ];

    public function getVariablesJsonStringAttribute()
    {
        return json_encode($this->attributes['variables_json']);
    }
    /* Allow filling into these for the database */
    protected $fillable = ['variables_json', 'id', 'formula_description', 'formula_sympi', 'formula_name', 'topic'];
    
}
