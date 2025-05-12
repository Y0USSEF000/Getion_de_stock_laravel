<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopmasterProduct extends Model
{
    protected $table = 'stock_products-shopmaster';
    protected $fillable = [
        'product_name',
        'product_type',
        'product_price',
        'product_quantity',
        'product_description',
        'product_img',
    ];
}