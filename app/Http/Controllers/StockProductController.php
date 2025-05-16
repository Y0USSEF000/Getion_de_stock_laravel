<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\StockProduct;
use Illuminate\Support\Facades\Auth;

class StockProductController extends Controller
{
    public function showAllProducts(Request $request)
    {
        $query = StockProduct::query();
        
        if ($request->has('category')) {
            $query->where('product_category', $request->category);
        }

        $products = $query->paginate(12);
        
        return view('stockshopmaster', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:stock_products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = StockProduct::findOrFail($request->product_id);

        Cart::create([
            'user_id' => Auth::id(), // current logged-in user
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
