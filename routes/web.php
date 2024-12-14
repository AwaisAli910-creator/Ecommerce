<?php

use App\Http\Controllers\Admin\bestsaleController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\colorController;
use App\Http\Controllers\Admin\ordersController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\sizeController;
use App\Http\Controllers\Admin\sliderController;
// use App\Http\Controllers\Admin\wishlistController;
use App\Http\Controllers\frontend\aboutusController;
use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\frontend\checkoutController;
use App\Http\Controllers\frontend\contactusController;
use App\Http\Controllers\frontend\frontendordertrackingController;
use App\Http\Controllers\frontend\frontendProductController;
use App\Http\Controllers\frontend\frontendstripeController;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\orderontroller;
use App\Http\Controllers\frontend\wishlistController;
use App\Http\Controllers\User\userController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [homeController::class, 'home'])->name('frontend.home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin middleware
Route::middleware(['auth','Role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
  
//Admin Routes Start
//Category Routes
Route::get('/admin/category', [categoryController::class, 'index'])->name('category.index');
Route::get('/admin/category/create', [categoryController::class, 'create'])->name('category.create');
Route::post('/admin/category', [categoryController::class, 'store'])->name('category.store');
Route::get('/admin/category/{id}', [categoryController::class, 'show'])->name('category.show');
Route::get('/admin/category/{id}/edit', [categoryController::class, 'edit'])->name('category.edit');
Route::put('/admin/category/{id}', [categoryController::class, 'update'])->name('category.update');
Route::delete('/admin/category/{id}', [categoryController::class, 'destroy'])->name('category.destroy');
//Route::get('/admin/categoryll/search_data', [categoryController::class, 'search'])->name('category.search');

// Products Routes
Route::get('/admin/products', [productController::class, 'index'])->name('products.index');
Route::get('/admin/products/create', [productController::class, 'create'])->name('products.create');
Route::post('/admin/products', [productController::class, 'store'])->name('products.store');
Route::get('/admin/products/{id}', [productController::class, 'show'])->name('products.show');
Route::get('/admin/products/{id}/edit', [productController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [productController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{id}', [productController::class, 'destroy'])->name('products.destroy');
// Route::get('/products/sidebar', [productController::class, 'sidebar'])->name('products.sidebar');

// Route for viewing product details
// Route::get('/admin/products/{id}', [productController::class, 'show'])->name('products.show');

//Route::get('/admin/productsll/search_data', [productController::class, 'search'])->name('products.search');

//Size Routes
Route::get('/admin/size', [sizeController::class, 'index'])->name('size.index');
Route::get('/admin/size/create', [sizeController::class, 'create'])->name('size.create');
Route::post('/admin/size', [sizeController::class, 'store'])->name('size.store');
Route::get('/admin/size/{id}', [sizeController::class, 'show'])->name('size.show');
Route::get('/admin/size/{id}/edit', [sizeController::class, 'edit'])->name('size.edit');
Route::put('/admin/size/{id}', [sizeController::class, 'update'])->name('size.update');
Route::delete('/admin/size/{id}', [sizeController::class, 'destroy'])->name('size.destroy');
//Route::get('/admin/sizell/search_data', [sizeController::class, 'search'])->name('products.search');

//Color Routes
Route::get('/admin/color', [colorController::class, 'index'])->name('color.index');
Route::get('/admin/color/create', [colorController::class, 'create'])->name('color.create');
Route::post('/admin/color', [colorController::class, 'store'])->name('color.store');
Route::get('/admin/color/{id}', [colorController::class, 'show'])->name('color.show');
Route::get('/admin/color/{id}/edit', [colorController::class, 'edit'])->name('color.edit');
Route::put('/admin/color/{id}', [colorController::class, 'update'])->name('color.update');
Route::delete('/admin/color/{id}', [colorController::class, 'destroy'])->name('color.destroy');
//Route::get('/admin/sizell/search_data', [sizeController::class, 'search'])->name('products.search');

//Slider Routes
Route::get('/admin/slider', [sliderController::class, 'index'])->name('slider.index');
Route::get('/admin/slider/create', [sliderController::class, 'create'])->name('slider.create');
Route::post('/admin/slider', [sliderController::class, 'store'])->name('slider.store');
Route::get('/admin/slider/{id}', [sliderController::class, 'show'])->name('slider.show');
Route::get('/admin/slider/{id}/edit', [sliderController::class, 'edit'])->name('slider.edit');
Route::put('/admin/slider/{id}', [sliderController::class, 'update'])->name('slider.update');
Route::delete('/admin/slider/{id}', [sliderController::class, 'destroy'])->name('slider.destroy');
Route::put('/slider/{id}/update-status', [SliderController::class, 'updateStatus'])->name('slider.updateStatus');

//Bestsale Routes
Route::get('/admin/bestsale', [bestsaleController::class, 'index'])->name('bestsale.index');
Route::get('/admin/bestsale/create', [bestsaleController::class, 'create'])->name('bestsale.create');
Route::post('/admin/bestsale', [bestsaleController::class, 'store'])->name('bestsale.store');
Route::get('/admin/bestsale/{id}', [bestsaleController::class, 'show'])->name('bestsale.show');
Route::get('/admin/bestsale/{id}/edit', [bestsaleController::class, 'edit'])->name('bestsale.edit');
Route::put('/admin/bestsale/{id}', [bestsaleController::class, 'update'])->name('bestsale.update');
Route::delete('/admin/bestsale/{id}', [bestsaleController::class, 'destroy'])->name('bestsale.destroy');

//Orders Route
Route::get('/admin/orders', [ordersController::class, 'index'])->name('orders.index');
Route::get('/admin/orders/create', [ordersController::class, 'create'])->name('orders.create');
Route::post('/admin/orders', [ordersController::class, 'store'])->name('orders.store');
Route::get('/admin/orders/{id}', [ordersController::class, 'show'])->name('orders.show');
Route::get('/admin/orders/{id}/edit', [ordersController::class, 'edit'])->name('orders.edit');
Route::put('/admin/orders/{id}', [ordersController::class, 'update'])->name('orders.update');
Route::delete('/admin/orders/{id}', [ordersController::class, 'destroy'])->name('orders.destroy');


//Admin Routes End

//User Middleware

});
Route::middleware(['auth','Role:user'])->group(function(){
Route::get('/user/dashboard', [userController::class, 'UserDashboard'])->name('User.dashboard');
 Route::get('/user/logout', [userController::class, 'UserLogout'])->name('User.logout');
   
});
Route::get('/user/login',[userController::class,'UserLogin'])->name('User.login');
//User Middleware End
 
//Frontend Routes About-us
Route::get('/aboutus', [aboutusController::class, 'aboutus'])->name('frontend.aboutus');

//Frontend Routes SLider
// Route::get('/slider',[slider::class,'frontend\sliderController@index'])->name('slider.index');

//Frontend Routes Contact-us
Route::get('/contactus', [contactusController::class, 'index'])->name('frontend.contactus');
Route::post('/contactus', [contactusController::class, 'sendEmail'])->name('frontend.send');

//Frontend Wishlist Routes
Route::get('/wishlist', [wishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{productId}', [wishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [wishlistController::class, 'remove'])->name('wishlist.remove');
Route::post('/wishlist/clear', [wishlistController::class, 'clear'])->name('wishlist.clear');

//Frontend Cart Routes
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [cartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [cartController::class, 'destroy'])->name('cart.remove');
Route::post('/cart/clear', [cartController::class, 'clear'])->name('cart.clear');

//Frontend Bestsale Routes
// Route::get('/bestsale', [\App\Http\Controllers\frontend\bestsaleController::class, 'index'])->name('wishlist.index');

//Frontend Checkout Routes
Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [checkoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/order_success', [checkoutController::class, 'orderSuccess'])->name('order_success');

//Frontend order Routes
// Route::post('/order', [orderontroller::class, 'store'])->name('order.store');
// Route::get('/order/confirmation/{order}', [orderontroller::class, 'confirmation'])->name('order.confirmation');

Route::get('/frontend/new_arrival/productsidebar', [FrontendProductController::class, 'sidebar'])->name('products.sidebar');

//Frontend  Payment Gateway Routes
Route::post('/create-checkout-session', [frontendstripeController::class, 'createCheckoutSession'])->name('stripe.checkout');
//  Route::post('/stripe', [frontendstripeController::class, 'stripe'])->name('stripe');
 Route::get('/stripe/success', [frontendstripeController::class, 'success'])->name('success');
 Route::get('/stripe/cancel', [frontendstripeController::class, 'cancel'])->name('cancel');

//Order-Tracking
// Route::get('/order_tracking', [frontendordertrackingController::class, 'OrderTracking'])->name('ordertracking');
Route::get('/order_tracking', [frontendordertrackingController::class, 'index'])->name('ordertracking.index');
// Route::get('/track-order', [OrderTrackingController::class, 'index'])->name('ordertracking.index');