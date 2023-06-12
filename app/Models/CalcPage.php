<?php

namespace App\Models;

use App\Casts\VarJson;
use Jenssegers\Mongodb\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

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
        'variables_json' => VarJson::class,
    ];

    /* Allow filling into these for the database */
    protected $fillable = ['variables_json', 'id', 'formula_description', 'formula_sympi', 'formula_name'];
    
}
