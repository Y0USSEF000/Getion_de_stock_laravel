<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage; 
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function showMessages()
    {
        $messages = SupportMessage::orderBy('created_at', 'desc')->get();
        return view('messages', compact('messages'));
    }
    public function addToCart(Request $request)
{
    $product = [
        'product_id' => $request->input('product_id'),
        'product_name' => $request->input('product_name'),
        'product_price' => $request->input('product_price'),
        'product_img' => $request->input('product_img'),
        'quantity' => $request->input('quantity'),
    ];

    if (Auth::check()) {
        // Logged-in user: save to database
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $product['product_id'];
        $cart->product_name = $product['product_name'];
        $cart->product_price = $product['product_price'];
        $cart->product_img = $product['product_img'];
        $cart->quantity = $product['quantity'];
        $cart->save();
    } else {
        // Guest user: save to session
        $cart = Session::get('cart', []);
        $cart[] = $product;
        Session::put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Produit ajouté au panier avec succès.');
}
}
