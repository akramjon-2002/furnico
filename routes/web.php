<?php

use App\Http\Controllers\Backend\CategoryController as BackendCategory;
use App\Http\Controllers\Backend\CommentController as BackendComment;
use App\Http\Controllers\Backend\IndexController as BackendIndex;
use App\Http\Controllers\Backend\PostController as BackendPost;
use App\Http\Controllers\Backend\ProductController as BackendProduct;
use App\Http\Controllers\Backend\UserController as BackendUser;
use App\Http\Controllers\Backend\CartController as BackendCart;
use App\Http\Controllers\Frontend\CartController as FrontendCart;
use App\Http\Controllers\Backend\CompanyReviewController;
use App\Http\Controllers\Frontend\IndexController as FrontendIndex;
use App\Http\Controllers\Frontend\PostController as FrontendPost;
use App\Http\Controllers\Frontend\ProductController as FrontendProduct;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\UserController as FrontendUser;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::name('user.')->group(function () {

             Route::get('/login', function () {
                  if (Auth::check()) {
             return redirect(route('frontend.home'));
          }
        return view('login');
    })->name('login');


    Route::post('/login',[LoginController::class, 'login']);


    Route::get('/logout', function (){
        Auth::logout();
        return redirect()->route('frontend.home');
    })->name('logout');


    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect()->intended('frontend.home');
        }
        return view('registration');
    })->name('registration');



    Route::post('/registration', [RegisterController::class, 'save']);

});





//FRONTEND ROUTES
Route::any('/', function (){
    return redirect()->route('frontend.home');
});

Route::prefix('frontend')->namespace('App\Http\Controllers\Frontend')->group(function () {
    Route::get('/index', [FrontendIndex::class, 'index'])->name('frontend.home');
    Route::get('/product/shop', [FrontendProduct::class, 'shop'])->name('frontend.product.shop');
    Route::get('/product/about', [FrontendProduct::class, 'about'])->name('frontend.product.about');
    Route::get('/product/contact', [FrontendProduct::class, 'contact'])->name('frontend.product.contact');
    Route::get('/product/show{product}', [FrontendProduct::class, 'show'])->name('frontend.product.show');

    Route::get('/post/index', [FrontendPost::class, 'index'])->name('frontend.post.index');
    Route::get('/post/show/{post}', [FrontendPost::class, 'show'])->name('frontend.post.show');


    Route::middleware('auth')->group(function () {
        Route::get('/user/index', [FrontendUser::class, 'index'])->name('frontend.user.index');
        Route::get('/cart/index', [FrontendCart::class, 'index'])->name('frontend.cart.index');
        Route::post('/cart/add/{product}', [FrontendCart::class, 'add'])->name('frontend.cart.add');
        Route::get('/cart/item-count', [FrontendCart::class, 'itemCount'])->name('cart.item');
        Route::post('/remove-from-cart/{productId}', [FrontendCart::class, 'removeFromCart']);
        Route::get('/get-cart', [FrontendCart::class, 'getCartData']);


        Route::get('/user/change-password', [FrontendUser::class, 'showChangePasswordForm'])->name('user.change-password');
        Route::post('/user/change-password', [FrontendUser::class, 'changePassword'])->name('user.change-password.post');

    });
});

//FRONTEND ROUTES

//BACKEND ROUTES
Route::middleware(['auth', 'admin'])->prefix('backend')->namespace('App\Http\Controllers\Backend')->group(function () {
    Route::get('/index', [BackendIndex::class, 'index'])->name('backend.home');

    Route::get('/user/index', [BackendUser::class, 'index'])->name('backend.user.index');
    Route::get('/user/show/{user}', [BackendUser::class, 'show'])->name('backend.user.show');
    Route::get('/user/edit/{user}', [BackendUser::class, 'edit'])->name('backend.user.edit');
    Route::post('/user/update/{user}', [BackendUser::class, 'update'])->name('backend.user.update');
    Route::delete('/user/delete/{user}', [BackendUser::class, 'delete'])->name('backend.user.delete');

    Route::get('/category/index', [BackendCategory::class, 'index'])->name('backend.category.index');
    Route::get('/category/create', [BackendCategory::class, 'create'])->name('backend.category.create');
    Route::post('/category/store', [BackendCategory::class, 'store'])->name('backend.category.store');
    Route::get('/category/show/{category}', [BackendCategory::class, 'show'])->name('backend.category.show');
    Route::get('/category/edit/{category}', [BackendCategory::class, 'edit'])->name('backend.category.edit');
    Route::patch('/category/update/{category}', [BackendCategory::class, 'update'])->name('backend.category.update');
    Route::delete('/category/delete/{category}', [BackendCategory::class, 'delete'])->name('backend.category.delete');

    Route::get('/post/index', [BackendPost::class, 'index'])->name('backend.post.index');
    Route::get('/post/create', [BackendPost::class, 'create'])->name('backend.post.create');
    Route::post('/post/store', [BackendPost::class, 'store'])->name('backend.post.store');
    Route::get('/post/show/{post}', [BackendPost::class, 'show'])->name('backend.post.show');
    Route::get('/post/edit/{post}', [BackendPost::class, 'edit'])->name('backend.post.edit');
    Route::patch('/post/update/{post}', [BackendPost::class, 'update'])->name('backend.post.update');
    Route::delete('/post/delete/{post}', [BackendPost::class, 'delete'])->name('backend.post.delete');

    Route::get('/product/index', [BackendProduct::class, 'index'])->name('backend.product.index');
    Route::get('/product/create', [BackendProduct::class, 'create'])->name('backend.product.create');
    Route::post('/product/store', [BackendProduct::class, 'store'])->name('backend.product.store');
    Route::get('/product/show/{product}', [BackendProduct::class, 'show'])->name('backend.product.show');
    Route::get('/product/edit/{product}', [BackendProduct::class, 'edit'])->name('backend.product.edit');
    Route::put('/product/update/{product}', [BackendProduct::class, 'update'])->name('backend.product.update');
    Route::delete('/product/delete/{product}', [BackendProduct::class, 'delete'])->name('backend.product.delete');

    Route::get('/comment/index', [BackendComment::class, 'index'])->name('backend.comment.index');
    Route::delete('/comment/delete/{comment}', [BackendComment::class, 'delete'])->name('backend.comment.delete');


    Route::post('/review/store', [CompanyReviewController::class, 'store'])->name('backend.review.store');

    Route::get('/cart/index', [BackendCart::class, 'index'])->name('backend.cart.index');
    Route::post('/cart/confirm', [BackendCart::class, 'confirm'])->name('cart.confirm');
});
// BACKEND ROUTES

