<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportMessageController;
use App\Http\Controllers\StockProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Http\Request;









Route::get('/', function () {
    return view('home');
});


Route::get('/create', [AuthController::class, 'showRegistrationForm'])->name('create');
Route::post('/create', [InscriptionController::class, 'store'])->name('create.submit');


Route::get('/ajouter-produit', [ProductController::class, 'create'])->name('ajouter-produit');
Route::post('/ajouter-produit', [ProductController::class, 'store'])->name('product.store');

// Category routes
Route::get('/products/clothes', [ProductController::class, 'clothes'])->name('products.clothes');
Route::get('/products/technology', [ProductController::class, 'technology'])->name('products.technology');
Route::get('/products/books', [ProductController::class, 'books'])->name('products.books');
Route::get('/products/video-games', [ProductController::class, 'videoGames'])->name('products.video-games');

Route::get('/books', [ProductController::class, 'books'])->name('books');
Route::get('/clothes', [ProductController::class, 'clothes'])->name('clothes');
Route::get('/Technology', [ProductController::class, 'technology'])->name('Technology');
Route::get('/video-games', [ProductController::class, 'videoGames'])->name('video-games');





Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/connexion' , function(){
return view('connexion');
})->name('connexion');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('connexion');
})->name('logout');

Route::get('/connexion', [AuthController::class, 'showLogin'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'login'])->name('login.submit');

Route::get('/page1', function () {
    return view('page1');
})->name('page1');

Route::get('/pageadmin', function () {
    return view('pageadmin');
})->name('pageadmin');



Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/produits', [ProductController::class, 'store'])->name('product.store');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/support', [SupportController::class, 'submit'])->name('contact.submit');

Route::get('/connexionadmin', function () {
    return view('connexionadmin');
})->name('connexionadmin');


Route::post('/admin/connexion', [AdminController::class, 'connexion'])->name('admin.connexion');
Route::get('/pageadmin', [AdminController::class, 'showLoginadminForm'])->name('pageadmin');

Route::get('/admin/users', [AdminController::class, 'index'])->name('users');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');

Route::get('/admin', [adminDashboard::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/messages', [SupportMessageController::class, 'showMessages'])->name('messages');

Route::get('/stock-products', [ProductController::class, 'index'])->name('stock_products');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/add-to-payment/{id}', [ProductController::class, 'addToPayment'])->name('add-to-payment');

Route::get('/payment', [ProductController::class, 'showPayment'])->name('payment');
Route::get('/remove-from-payment/{id}', [ProductController::class, 'removeFromPayment'])->name('remove-from-payment');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/stockshopmaster', [StockProductController::class, 'showAllProducts'])->name('stockshopmaster');
Route::get('/products', function () {
    return redirect()->route('stockshopmaster');
})->name('products.index');
Route::get('/stockshopmaster', [ProductController::class, 'index'])->name('stockshopmaster');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');


Route::get('/productsadmin', [DashboardController::class, 'index'])->name('productsadmin');
Route::post('/dashboard/store', [DashboardController::class, 'storeProduct'])->name('dashboard.store');
Route::get('/loginadmin', [AdminController::class, 'showLoginadminForm'])->name('connexionadmin');
Route::post('/loginadmin', [AdminController::class, 'connexion'])->name('loginadmin');
Route::get('/users', [AdminController::class, 'index'])->name('users');
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
Route::post('/submit', [AdminController::class, 'submit'])->name('submit');
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'showProducts'])->name('admin.products');
Route::post('/admin/dashboard/store', [AdminController::class, 'storeProduct'])->name('admin.dashboard.store');
Route::delete('/admin/dashboard/product/{id}', [AdminController::class, 'destroyProduct'])->name('admin.dashboard.destroy');

Route::get('/users', [UserController::class, 'create'])->name('users');


Route::prefix('admin')->group(function() {
    Route::get('/products', [ProductController::class, 'index2'])->name('admin.products.index');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    // Add other product routes as needed
});

Route::get('/admin/add-product', [AdminProductController::class, 'create'])->name('admin.add-product');
Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.product.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
