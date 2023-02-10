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

    protected $casts = [
        'variables_json' => 'array'
    ];

    protected $fillable = ['variables_json'];
    protected $guarded = [];
    
}
