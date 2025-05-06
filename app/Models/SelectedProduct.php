<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    use HasFactory;

    protected $table = 'stock_products';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'product_description',
        'product_type',
        'product_img',
    ];
}