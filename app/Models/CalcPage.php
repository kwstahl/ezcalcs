<?php

namespace App\Models;

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
        'variables' => 'array',
    ];

    /* Allow filling into these for the database */
    protected $fillable = ['variables', 'id', 'formula_description', 'formula_sympi', 'formula_name'];
    
}
