<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('main.index');
});

Route::group(['namespace' => 'Category','prefix' => 'category'],function(){
    Route::get('/','IndexController')->name('category.index');
    Route::get('/{category}','ShowController')->name('category.show');
});

Route::group(['namespace' => 'Main','prefix' => 'main'],function(){
    Route::get('/','IndexController')->name('main.index');
});
Route::group(['namespace' => 'About','prefix' => 'about'],function(){
    Route::get('/','IndexController')->name('about.index');
});
Route::group(['namespace' => 'Basket','prefix' => 'basket','middleware' => 'auth'],function(){
    Route::get('/','IndexController')->name('basket.index');
    Route::get('/show','ShowController')->name('basket.show');
    Route::post('/{product}','CreateController')->name('basket.create');
    Route::patch('/update/{busket}','UpdateController')->name('basket.update');
    Route::delete('/delete/{busket}','DeleteController')->name('basket.delete');
    Route::patch('/promokode','PromokodeControllder')->name('basket.promokode.update');
    Route::get('/check','CheckController')->name('baskes.check');
});
Route::group(['namespace' => 'Catalog','prefix' => 'catalog'],function(){
    Route::get('/','IndexController')->name('catalog.index');
    Route::get('/{category}','ShowController')->name('catalog.show.category');
    Route::get('/{category}/{subCategory}','ShowController')->name('catalog.show.subCategory');
    Route::get('/{category}/{subCategory}/{subSubCategory}','ShowController')->name('catalog.show.subSubCategory');
});
Route::group(['namespace' => 'Product','prefix' => 'product'],function(){
    Route::get('/show/{product}','ShowController')->name('product.show');
});
Route::group(['namespace' => 'Favourites','prefix' => 'favourites'],function(){
    Route::get('/','IndexController')->name('favourites.index');
    Route::get('/show','ShowController')->name('favourites.show');
});
Route::group(['namespace' => 'Info','prefix' => 'info'],function(){
    Route::get('/order','OrderController')->name('info.order');
    Route::get('/delivery','DeliveryController')->name('info.delivery');
    Route::get('/refund','RefundController')->name('info.refund');
    Route::get('/questions','QuestionsController')->name('info.questions');
});
Route::group(['namespace' => 'Orders','prefix' => 'orders','middleware' => 'auth'],function(){
    Route::get('/','IndexController')->name('orders.index');
    Route::post('/create','CreateController')->name('orders.create');
});
Route::group(['namespace' => 'MyOrders','prefix' => 'my_orders','middleware' => 'auth'],function(){
    Route::get('/','IndexController')->name('my_orders.index');
    Route::post('/{order}','CancDelController')->name('orders.canc.del');
});
Route::group(['namespace' => 'Profiler','prefix' => 'profiler','middleware' => 'auth'],function(){
    Route::get('/','IndexController')->name('profiler.index');
    Route::patch('/update/{user}','UpdateControllder')->name('profiler.update');
});
Route::group(['namespace' => 'Review','prefix' => 'review'],function(){
    Route::get('/{product}','IndexController')->name('review.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
