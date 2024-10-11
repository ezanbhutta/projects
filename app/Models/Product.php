<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "category",
        "product_name",
        "product_min_limit",
        "product_unit",
        "product_price",
        "product_weight",
        'product_image',
        'product_description',
        "added_from",
    ];
}
