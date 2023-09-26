<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $table='products';

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'price',
        'stock',
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'price' => PriceCast::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];


}
