<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'product_img',
        'product_type',
        'product_quantity',
    ];
}
   