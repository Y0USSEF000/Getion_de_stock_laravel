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








Route::get('/', function () {
    return view('home');
});


Route::get('/create', [AuthController::class, 'showRegistrationForm'])->name('create');
Route::post('/create', [InscriptionController::class, 'store'])->name('create.submit');


Route::get('/ajouter-produit', [ProductController::class, 'create'])->name('ajouter-produit');
Route::post('/ajouter-produit', [ProductController::class, 'store'])->name('product.store');

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








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
