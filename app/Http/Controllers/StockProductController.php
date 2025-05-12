<?php
namespace App\Http\Controllers;

use App\Models\StockProduct;
use Illuminate\Http\Request;

class StockProductController extends Controller
{
    public function showAllProducts(Request $request)
    {
        $validTypes = ['clothes', 'electronics', 'video games', 'books'];
        $productType = $request->query('product_type');
        
        if ($productType && in_array($productType, $validTypes)) {
            $products = StockProduct::where('product_type', $productType)->paginate(10);
        } else {
            $products = StockProduct::paginate(10);
        }

        return view('stockshopmaster', compact('products'));
    }
}