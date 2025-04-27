<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('ajouter-produit');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = null;
        }

        Product::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
        ]);

        return redirect()->route('ajouter-produit')->with('success', 'Produit ajouté avec succès.');
    }
    public function index()
{
    $products = Product::latest()->get();
    return view('admin.products', compact('products'));
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->image) {
        \Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()->route('admin.products')->with('success', 'Produit supprimé avec succès !');
}

}
