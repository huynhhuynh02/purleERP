<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'serial', 'name', 'thumbnail', 'slug', 'price', 'cost_price', 'created_by'];

    public $incrementing = false;

}
