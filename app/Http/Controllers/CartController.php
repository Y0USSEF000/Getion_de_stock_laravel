<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Store item in cart (for both guests and authenticated users)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:stock_products,id',
            'quantity' => 'required|integer|min:1|max:100',
            'product_name' => 'sometimes|string',
            'product_price' => 'sometimes|numeric',
            'product_img' => 'sometimes|string'
        ]);

        $product = StockProduct::findOrFail($request->product_id);

        // Check stock availability
        if ($request->quantity > $product->product_quantity) {
            return back()->with('error', 'Not enough stock available!');
        }

        if (Auth::check()) {
            // Authenticated user - store in database
            $cartItem = Cart::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'product_id' => $product->id
                ],
                [
                    'quantity' => \DB::raw("quantity + {$request->quantity}")
                ]
            );
        } else {
            // Guest user - store in session
            $cart = session()->get('cart', []);

            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $request->quantity;
            } else {
                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'name' => $product->product_name,
                    'price' => $product->product_price,
                    'img' => $product->product_img,
                    'quantity' => $request->quantity
                ];
            }

            session()->put('cart', $cart);
        }

        return back()->with('success', 'Product added to cart!');
    }

    // Show cart contents
    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'product_id' => $item->product_id,
                        'name' => $item->product->product_name,
                        'price' => $item->product->product_price,
                        'img' => $item->product->product_img,
                        'quantity' => $item->quantity
                    ];
                });
        } else {
            $cartItems = collect(session()->get('cart', []))
                ->map(function ($item, $key) {
                    return [
                        'id' => $key, // Using product_id as temporary ID
                        'product_id' => $key,
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'img' => $item['img'],
                        'quantity' => $item['quantity']
                    ];
                });
        }

        return view('cart', ['cartItems' => $cartItems]);
    }

    // Remove item from cart
    public function destroy($id)
    {
        if (Auth::check()) {
            $item = Cart::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();
            $item->delete();
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed from cart!');
    }

    // Update item quantity
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:100'
        ]);

        if (Auth::check()) {
            $item = Cart::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();
            $item->update(['quantity' => $request->quantity]);
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return back()->with('success', 'Cart updated!');
    }
}