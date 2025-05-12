<?php

namespace App\Http\Controllers;

use App\Models\StockProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = StockProduct::query();

        if ($request->has('product_type') && $request->product_type) {
            $query->where('product_type', $request->product_type);
        }

        $products = $query->latest()->paginate(12);

        return view('stockshopmaster', compact('products'));
    }


    public function create()
    {
        return view('ajouter-produit');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'product_type' => 'required|string|in:Clothes,Technology,Books,Video games',
            'product_price' => 'required|numeric|min:0',
            'product_quantity' => 'required|integer|min:1',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_img')) {
            $imagePath = $request->file('product_img')->store('products', 'public');
        }

        Product::create([
            'name' => $request->input('product_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'category' => $request->input('product_type'),
            'price' => $request->input('product_price'),
            'quantity' => $request->input('product_quantity'),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
    }

    public function books()
    {
        $books = Product::where('category', 'Books')->get();
        return view('books', compact('books'));
    }

    public function clothes()
    {
        $clothes = Product::where('category', 'Clothes')->get();
        return view('clothes', compact('clothes'));
    }

    public function technology()
    {
        $technologies = Product::where('category', 'Technology')->get();
        return view('Technology', compact('technologies'));
    }

    public function videoGames()
    {
        $products = Product::where('category', 'Video games')->get();
        return view('video-games', compact('products'));
    }
public function index2()
{
    $products = StockProduct::all(); 
    return view('products', compact('products'));
}

public function destroy($id)
{
    $product = StockProduct::findOrFail($id);
    $product->delete();
    
    return redirect()->route('products.index')
                   ->with('success', 'Product deleted successfully');
}
}