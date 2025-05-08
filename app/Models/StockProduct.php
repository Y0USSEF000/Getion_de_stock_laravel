<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'email',
        'phone',
        'product_type',
        'product_price',
        'product_quantity',
        'product_description',
        'product_img',
    ];
}
