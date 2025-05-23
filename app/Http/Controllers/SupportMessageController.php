<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupportMessageController extends Controller
{
    public function showMessages()
    {
        $messages = SupportMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('messages', compact('messages'));
    }
    
    // This should be moved to a separate CartController
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
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->product_id = $product['product_id'];
            $cart->product_name = $product['product_name'];
            $cart->product_price = $product['product_price'];
            $cart->product_img = $product['product_img'];
            $cart->quantity = $product['quantity'];
            $cart->save();
        } else {
            $cart = Session::get('cart', []);
            $cart[] = $product;
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès.');
    }
}