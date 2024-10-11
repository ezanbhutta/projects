<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'order_key',
        'product_quantity',
        'status',
        'date',
        "price",
        "customer_id",
    ];
}
