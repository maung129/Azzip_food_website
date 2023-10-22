<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Models\Product;
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



Route::middleware(GuestMiddleware::class)->group(function(){
    Route::get('/login',[AuthController::class,'login']);
    Route::get('/register',[AuthController::class,'create']);
    Route::post('/login',[AuthController::class,'user_login'])->name('login');
    Route::post('/register',[AuthController::class,'store'])->name('register');
});




//auth routes
Route::middleware(AuthMiddleware::class)->group(function(){
    //welcome page

    Route::get('/', function () {
        return view('user.welcome');
    })->name('welcome');
    //logout
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    //menu page
    Route::get('/menu',[ProductController::class,'index'])->name('menu');
    //blog page
    Route::get('/blogs',function(){
        return view('user.blogs');
    })->name('blog');

    //blog page
Route::get('/blogs',[BlogController::class,'index'])->name("blogs");
Route::get('/blogs/{id}',[BlogController::class,'show'])->name('blogDetail');
Route::get('/blogs/category/{id}',[BlogController::class,'filter'])->name("filteredBlogs");
//category filtering


//product
Route::get('/products/{id}',[ProductController::class,'show'])->name('productDetail');
Route::delete('/products/{id}',[ProductController::class,'destory'])->name('productDelete');


//comment
Route::post('/blogs/{blog}/comment',[CommentController::class,'store'])->name('commentCreate');

//menu
Route::get('/products/hotmenus/{category}',[ProductController::class,'filter'])->name('hotmenus');

//cart
Route::get('/product/cart/{id}',[CartController::class,'index'])->name('cart');
// Route::get('/cartlist',[CartController::class,'viewlist'])->name('gotocart');
Route::get('/orderlist/{id}',[CartController::class,'list'])->name('orderlist');
Route::get('/cartlist/cancel/{id}',[CartController::class,'cancel'])->name('orderCancle');
Route::get('/order/complete',[CartController::class,'ordered'])->name('finish');


//order
Route::post('/ordered',[OrderController::class,"store"])->name("storeInorder");

//contactResponse
Route::get('/thankyou',function(){
    return view('user.contactresponse');
})->name('contactResponse');
});






Route::middleware(AdminMiddleware::class)->group(function(){
    //admin dashboard
    Route::get('/dashboard',function(){
        $products = Product::with('category')->get();
        return view('admin.home',[
            "products"=>$products
        ]);
    });

    //admin create product
Route::get('/admin/createProduct',[ProductController::class,'createProduct'])->name('createProduct');
Route::post('/admin/storeProduct',[ProductController::class,'storeProduct'])->name('storeProduct');


//admin create category
Route::get('/admin/createCat',[CategoryController::class,'create'])->name('createCat');
Route::post('/admin/storeCat',[CategoryController::class,'store'])->name('storeCat');

//admin create blog
Route::get('/admin/createBlog',[BlogController::class,'createBlog'])->name('createBlog');
Route::post('/admin/storeBlog',[BlogController::class,'storeBlog'])->name('storeBlog');

//admin profile
Route::get('/admin/profile',[AdminController::class,'index'])->name('adminProfile');


//admin blog crud
Route::post('/createBlog',[BlogController::class,'storeBlog'])->name('storeBlog');
Route::get('/edit/blog/{id}',[BlogController::class,"edit"])->name('updateBlog');
Route::delete('/delete/{id}',[BlogController::class,'destroy'])->name('deleteBlog');
Route::post('/update/blog/{id}',[BlogController::class,"update"])->name('update');

//categorylist show
Route::get('/admin/categories',[CategoryController::class,'index'])->name('categoriesList');


//admin order section
Route::get('/order/completed',[OrderController::class,'index'])->name("viewOrders");

});
Route::post('/statusChange',[OrderController::class,'statusChange'])->name('statusChange');
Route::get('/orderDetail/{id}/{user}',[OrderController::class,'orderDetail'])->name('orderDetail');
Route::get('/statusFinished/{id}',[OrderController::class,'statusFinished'])->name('statusFinished');















