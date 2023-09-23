<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'unit_class', 'base_unit', 'symbol', 'conversion_to_base', 'description', 'type'];
    protected $primaryKey = 'id';
  
}
