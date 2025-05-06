<?php

namespace App\Http\Controllers;

use App\Models\StockProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $productType = $request->query('product_type', '');

        // Query products with optional filtering by product_type
        $query = StockProduct::query();
        if ($productType) {
            $query->where('product_type', $productType);
        }

        // Paginate the results (e.g., 12 products per page)
        $products = $query->paginate(12);

        // Pass the products to the Blade view
        return view('stockshopmaster', compact('products'));
    }
}