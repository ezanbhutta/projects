<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'contact_no',
        'country',
        'state',
        'city',
        'zip_code',
        'street_address',
        'order_note',
        'payment_method',
    ];
}
