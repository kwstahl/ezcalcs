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
    /** Make variables_json into a PHP array */
    protected $casts = [
        'variables_json' => 'array',
    ];
}
