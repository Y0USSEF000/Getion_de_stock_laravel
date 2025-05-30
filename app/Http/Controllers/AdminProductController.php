<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockProduct;
use Exception;

class AdminProductController extends Controller
{
    public function create()
    {
        return view('add-product-admin');
    }
    public function index()
{
    $products = StockProduct::all();
    return view('products', compact('products'));
}


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_name' => 'required|string|max:255',
                'product_type' => 'required|string|in:Clothes,Technology,Books,Video games',
                'product_price' => 'required|numeric|min:0',
                'product_quantity' => 'required|integer|min:1',
                'product_description' => 'nullable|string',
                'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('product_img')) {
                $path = $request->file('product_img')->store('products', 'public');
                $validated['product_img'] = $path;
            }

            StockProduct::create($validated);

            return redirect()->route('admin.add-product')->with('success', 'Produit enregistré avec succès !');
        } catch (Exception $e) {
            return redirect()->route('admin.add-product')->with('error', 'Erreur lors de l\'enregistrement du produit.');
        }
    }

    public function destroy($id)
    {
        $product = StockProduct::findOrFail($id); 
        $product->delete();
        
        return redirect()->route('products')->with('success', 'Produit supprimé avec succès');
    }
}
