<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('subscriptons/store',[SubscriptionController::class, 'store'])->name('subscriptions.store');

Route::get('subscriptons/checkout',[SubscriptionController::class, 'checkout'])->name('subscriptions.checkout');

Route::get('subscriptons/premium',[SubscriptionController::class, 'premium'])->name('subscriptions.premium')->middleware('subscribed');

Route::get('subscriptons/account',[SubscriptionController::class, 'account'])->name('subscriptions.account');//rota para exibir as view com assinaturas


Route::get('subscriptons/invoice/{id}',[SubscriptionController::class, 'downloadInvoice'])->name('subscriptions.invoice.download');

Route::get('/',[SiteController::class, 'home'])->name('site.home');




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
