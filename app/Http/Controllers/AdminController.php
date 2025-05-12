<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SupportMessage;
use App\Models\StockProduct;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginadminForm()
    {
        return view('pageadmin');
    }

    public function connexion(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'admin123@gmail.com' && $password === 'admin123') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('connexionadmin')->with('error', 'Email ou mot de passe incorrect');
        }
    }

    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }

    public function submit(Request $request)
    {
        return redirect()->back()->with('success', 'Action réussie');
    }

    public function adminDashboard()
    {
        $users = User::all();
        $messages = SupportMessage::latest()->get();
        $products = StockProduct::all();

        return view('pageadmin', [
            'users' => $users,
            'messages' => $messages,
            'products' => $products,
            'activeSection' => 'dashboard', // Indicate active section
        ]);
    }

    public function showSupport()
    {
        $messages = SupportMessage::latest()->get();
        return view('support', [
            'messages' => $messages,
            'activeSection' => 'support', // Indicate active section
        ]);
    }

    public function showProducts()
    {
        $products = StockProduct::all();
        return view('products', [
            'products' => $products,
            'activeSection' => 'products', // Indicate active section
        ]);
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

    public function destroyProduct($id)
    {
        $product = StockProduct::findOrFail($id);
        if ($product->product_img) {
            \Storage::delete('public/' . $product->product_img);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}