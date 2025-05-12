<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockProduct;
use App\Models\SupportMessage; // Placeholder model
use App\Models\User; // Placeholder model

class DashboardController extends Controller
{
    public function index()
    {
        $supportMessages = SupportMessage::all(); // Replace with your model/query
        $users = User::all(); // Replace with your model/query
        $products = StockProduct::all();
        return view('productsadmin', compact('supportMessages', 'users', 'products'));
    }

    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_quantity' => 'required|integer|min:1',
            'product_description' => 'nullable|string',
            'product_type' => 'required|string|in:Clothes,Technology,Books,Video games',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_img')) {
            $imagePath = $request->file('product_img')->store('products', 'public');
        }

        StockProduct::create([
            'product_name' => $validatedData['product_name'],
            'product_price' => $validatedData['product_price'],
            'product_quantity' => $validatedData['product_quantity'],
            'product_description' => $validatedData['product_description'],
            'product_type' => $validatedData['product_type'],
            'product_img' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
    }
}