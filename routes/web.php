<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\petController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebhooksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('search', SearchController::class)->name('search');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');
// Route::middleware(['auth', 'verified'])
Route::middleware('auth')->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', CreateOrder::class)->name('orders.create');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    // Route::get('orders/{order}/payment', [OrderController::class,'payment'])->name('orders.payment');

    Route::get('orders/{order}/payment', PaymentOrder::class, 'payment')->name('orders.payment');
    Route::post('orders/{order}/payment', PaymentOrder::class, 'store')->name('orders.store');
    Route::post('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    Route::get('pets', [petController::class, 'index'])->name('pet.index');
    Route::get('pets/princesa',[petController::class, 'show'])->name('pet.show');
    Route::post('webhooks', WebhooksController::class);
});

Route::get('conocenos', function () {
    return view('web.conocenos');
})->name('conocenos');

Route::get('publicidad', function () {
    return view('web.publicidad');
})->name('publicidad');

// Route::get('servicios', function () {
//     return view('web.servicios');
// })->name('servicios');

Route::get('noticia', function(){
    return view('web.noticias');
})->name('noticia.show');

Route::get('noticia/{$id}', function(){
    return view('web.shownoticia');
})->name('shownoticia.show');

Route::get('servicios', function(){
    return view('web.service');
})->name('servicios');

Route::get('politicas-de-privacidad', function(){
    return view('web.politicas');
})->name('politicas');

Route::get('terminos-y-condiciones', function(){
    return view('web.terminos');
})->name('terminos');

Route::get('libro-reclamaciones', function(){
    return view('web.reclamos');
})->name('reclamos');

Route::get('contactanos',[ContactoController::class, 'index'])->name('contacto');

Route::post('contactanos',[ContactoController::class, 'store'])->name('contacto.store');

Route::get('ventas-al-por-mayor', function(){
    return view('web.ventasmayor');
})->name('ventamayor');


//LOGIN GOOGLE
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    // $user->token
    $userExist = User::where('external_id', $user->id)->first();
    if($userExist){
        Auth::login($userExist);
    }else{
        $userNew =  User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google'
        ]);

        Auth::login($userNew);
    }

    return redirect('/');
});

// LOGIN FACEBOOK
Route::get('/login-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('/facebook-callback', function () {
    $facebookUser = Socialite::driver('facebook')->user();
    $user = User::where('facebook_id', $facebookUser->id)->first();
 
    if ($user) {
        $user->update([
            'facebook_token' => $facebookUser->token,
            'facebook_refresh_token' => $facebookUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'facebook_token' => $facebookUser->token,
            'facebook_refresh_token' => $facebookUser->refreshToken,
        ]);
    }
 
    Auth::login($user);
 
    return redirect('/');
});

// Route::middleware([' ', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
