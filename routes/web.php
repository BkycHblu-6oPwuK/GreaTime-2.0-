<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Database\Eloquent\BroadcastableModelEventOccurred;
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
    Route::get('/','IndexController')->middleware('ajax')->name('category.index');
    Route::get('/{category}','ShowController')->middleware('ajax')->name('category.show');
});
Route::group(['namespace' => 'Main','prefix' => 'main'],function(){
    Route::get('/','IndexController')->name('main.index');
    Route::get('/search','SearchController')->name('search');
    Route::post('/mailing/store','StoreController')->name('main.mailing.store');
});
Route::group(['namespace' => 'About','prefix' => 'about'],function(){
    Route::get('/','IndexController')->name('about.index');
});
Route::group(['namespace' => 'Basket','prefix' => 'basket'],function(){
    Route::get('/','IndexController')->middleware(['auth','verified'])->name('basket.index');
    Route::get('/show','ShowController')->middleware('auth')->middleware('ajax')->name('basket.show');
    Route::post('/{product}','CreateController')->middleware(['auth','verified'])->middleware('ajax')->name('basket.create');
    Route::patch('/update/{busket}','UpdateController')->middleware('auth')->middleware('ajax')->name('basket.update');
    Route::delete('/delete/{busket}','DeleteController')->middleware('auth')->middleware('ajax')->name('basket.delete');
    Route::patch('/promokode','PromokodeControllder')->middleware('auth')->middleware('ajax')->name('basket.promokode.update');
    Route::get('/check','CheckController')->middleware('ajax')->name('baskes.check');
});
Route::group(['namespace' => 'Catalog','prefix' => 'catalog'],function(){
    Route::get('/','ShowController')->name('catalog.index');
    Route::get('/{category}','ShowController')->name('catalog.show.category');
    Route::get('/{category}/{subCategory}','ShowController')->name('catalog.show.subCategory');
    Route::get('/{category}/{subCategory}/{subSubCategory}','ShowController')->name('catalog.show.subSubCategory');
});
Route::group(['namespace' => 'Product','prefix' => 'product'],function(){
    Route::get('/show/{product}','ShowController')->name('product.show');
});
Route::group(['namespace' => 'Favourites','prefix' => 'favourites'],function(){
    Route::get('/','IndexController')->name('favourites.index');
    Route::get('/show','ShowController')->middleware('ajax')->name('favourites.show');
    Route::get('/get','GetIdController')->middleware('ajax')->name('favourites.get');
    Route::get('/delete/{id}','DeleteController')->middleware('ajax')->name('favourites.delete');
});
Route::group(['namespace' => 'Info','prefix' => 'info'],function(){
    Route::get('/order','OrderController')->name('info.order');
    Route::get('/delivery','DeliveryController')->name('info.delivery');
    Route::get('/refund','RefundController')->name('info.refund');
    Route::get('/questions','QuestionsController')->name('info.questions');
});
Route::group(['namespace' => 'Orders','prefix' => 'orders','middleware' => ['auth','verified']],function(){
    Route::get('/','IndexController')->name('orders.index');
    Route::post('/create','CreateController')->name('orders.create');
});
Route::group(['namespace' => 'MyOrders','prefix' => 'my_orders','middleware' => ['auth','verified']],function(){
    Route::get('/','IndexController')->name('my_orders.index');
    Route::post('/{order}','CancDelController')->name('orders.canc.del');
});
Route::group(['namespace' => 'Profiler','prefix' => 'profiler','middleware' => ['auth','verified']],function(){
    Route::get('/','IndexController')->name('profiler.index');
    Route::patch('/update/{user}','UpdateControllder')->name('profiler.update');
});
Route::group(['namespace' => 'Review','prefix' => 'review'],function(){
    Route::get('/{product}','IndexController')->middleware('ajax')->name('review.index');
    Route::get('/create/{product}','ShowController')->name('review.show');
    Route::post('/store/{product}','StoreController')->name('review.store');
});
Route::group(['namespace' => 'MyReviews','prefix' => 'my_reviews','middleware' => ['auth','verified']],function(){
    Route::get('/','IndexController')->name('my_reviews.index');
    Route::get('/get_reviews','GetReviewController')->middleware('ajax')->name('get_reviews.index');
    Route::delete('/delete/{review}','DeleteController')->middleware('ajax')->name('my_reviews.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth','verified','admin']], function(){
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/','IndexController')->name('admin.index');
    });
    Route::group(['namespace' => 'Products', 'prefix' => 'products'], function(){
        Route::get('/','IndexController')->name('admin.product.index');
        Route::get('/category/{category}','IndexController')->name('admin.product.category.index');
        Route::get('/subcategory/{subcategory}','IndexController')->name('admin.product.subcategory.index');
        Route::get('/subcategory_2/{subcategory_2}','IndexController')->name('admin.product.subcategory_2.index');
        Route::get('/create','CreateController')->name('admin.product.create');
        Route::get('/getCategory/{id_category}','GetCategory')->name('admin.product.getCategory');
        Route::get('/getCategory/{id_category}/{id_subcategory}','GetCategory')->name('admin.product.getSubcategory');
        Route::post('/','StoreController')->name('admin.product.store');
        Route::get('/{product}/edit','EditController')->name('admin.product.edit');
        Route::patch('/{product}','UpdateController')->name('admin.product.update');
        Route::delete('/{product}','DeleteController')->name('admin.product.delete');
        Route::group(['prefix' => '{product}'],function(){
            Route::get('/','ShowController')->name('admin.product.show');
            Route::group(['namespace' => 'Gallary', 'prefix' => 'gallary'],function(){
                Route::get('/main','IndexController')->name('admin.gallary.index');
                Route::get('/create','CreateController')->name('admin.gallary.create');
                Route::post('/','StoreController')->name('admin.gallary.store');
                Route::delete('/{gallary}','DeleteController')->name('admin.gallary.delete');
            });
        });

        Route::group(['namespace' => 'Sizes', 'prefix' => 'sizes'],function(){
            Route::get('/edits','EditController')->name('admin.size.edits');
            Route::get('/create/{product}','CreateController')->name('admin.size.create');
            Route::post('/store/{product}','StoreController')->name('admin.size.store');
            Route::delete('/delete/{size}','DeleteController')->name('admin.size.delete');
            Route::get('/deletes','DeletesController')->name('admin.sizes.deletes');
            Route::patch('/update','UpdateController')->name('admin.sizes.update');
        });
        Route::group(['namespace' => 'Characteristics', 'prefix' => 'characteristic'],function(){
            Route::get('/edits','EditController')->name('admin.characteristic.edits');
            Route::get('/create/{product}','CreateController')->name('admin.characteristic.create');
            Route::post('/store/{product}','StoreController')->name('admin.characteristic.store');
            Route::delete('/delete/{char}','DeleteController')->name('admin.characteristic.delete');
            Route::get('/deletes','DeletesController')->name('admin.characteristics.deletes');
            Route::patch('/update','UpdateController')->name('admin.characteristics.update');
        });
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/','IndexController')->name('admin.category.index');
        Route::get('/create','CreateController')->name('admin.category.create');
        Route::post('/','StoreController')->name('admin.category.store');
        Route::get('/{category}','ShowController')->name('admin.category.show');
        Route::get('/{category}/edit','EditController')->name('admin.category.edit');
        Route::patch('/{category}','UpdateController')->name('admin.category.update');
        Route::delete('/{category}','DeleteController')->name('admin.category.delete');
    });
    Route::group(['namespace' => 'Subcategory', 'prefix' => 'subcategories'], function(){
        Route::get('/','IndexController')->name('admin.subcategory.index');
        Route::get('/create','CreateController')->name('admin.subcategory.create');
        Route::post('/','StoreController')->name('admin.subcategory.store');
        Route::get('/{subcategory}','ShowController')->name('admin.subcategory.show');
        Route::get('/{subcategory}/edit','EditController')->name('admin.subcategory.edit');
        Route::patch('/{subcategory}','UpdateController')->name('admin.subcategory.update');
        Route::delete('/{subcategory}','DeleteController')->name('admin.subcategory.delete');
    });
    Route::group(['namespace' => 'Subcategory_2', 'prefix' => 'subcategories_2'], function(){
        Route::get('/','IndexController')->name('admin.subcategory_2.index');
        Route::get('/create','CreateController')->name('admin.subcategory_2.create');
        Route::post('/','StoreController')->name('admin.subcategory_2.store');
        Route::get('/{subcategory_2}','ShowController')->name('admin.subcategory_2.show');
        Route::get('/{subcategory_2}/edit','EditController')->name('admin.subcategory_2.edit');
        Route::patch('/{subcategory_2}','UpdateController')->name('admin.subcategory_2.update');
        Route::delete('/{subcategory_2}','DeleteController')->name('admin.subcategory_2.delete');
    });
    Route::group(['namespace' => 'Orders', 'prefix' => 'orders'],function(){
        Route::get('/','IndexController')->name('admin.orders.index');
        Route::get('/{order}','ShowController')->name('admin.orders.show');
        Route::get('/update/{order}','UpdateController')->name('admin.orders.update');
    });
    Route::group(['namespace' => 'Reviews', 'prefix' => 'reviews'],function(){
        Route::get('/','IndexController')->name('admin.reviews.index');
        Route::get('/{review}','ShowController')->name('admin.reviews.show');
        Route::patch('/update/{review}','UpdateController')->name('admin.reviews.update');
    });
    Route::group(['namespace' => 'Promokode', 'prefix' => 'promokode'], function(){
        Route::get('/','IndexController')->name('admin.promokode.index');
        Route::get('/getProducts/{category}','GetProductsController')->name('admin.promokode.products.index');
        Route::get('/create','CreateController')->name('admin.promokode.create');
        Route::post('/','StoreController')->name('admin.promokode.store');
        Route::get('/{promokode}','ShowController')->name('admin.promokode.show');
        Route::get('/{promokode}/edit','EditController')->name('admin.promokode.edit');
        Route::patch('/{promokode}','UpdateController')->name('admin.promokode.update');
        Route::delete('/{promokode}/{product}','DeleteController')->name('admin.promokode.product.delete');
        Route::delete('/{promokode}','DeletesController')->name('admin.promokodes.deletes');
    });
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
