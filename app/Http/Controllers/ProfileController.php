<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SelectedProduct;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit'); 

        $product = Product::findOrFail($id);

    if (!SelectedProduct::where('product_id', $product->id)->exists()) {
        SelectedProduct::create([
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'product_price' => $product->product_price,
        ]);
    }

    return redirect()->route('payment');
    }
    public function showPayment()
{
    $selectedProducts = SelectedProduct::all();
    return view('payment', compact('selectedProducts'));
}

public function removeFromPayment($id)
{
    $selectedProduct = SelectedProduct::findOrFail($id);
    $selectedProduct->delete();
    return redirect()->route('payment');
}
}
