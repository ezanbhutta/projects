<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuantityUnitController;
use App\Models\QuantityUnit;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('event:clear');
    return redirect()->back();
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/get_category/{id}', 'get_category')->name('get_category');
    Route::get('/product/details/{id}', 'productDetials')->name('product.detials');
    Route::get('/login', 'signin')->name('authentication.signin');
    Route::get('/register', 'register')->name('authentication.register');
    Route::get('/forget', 'forget')->name('authentication.forget');
    Route::get('/resend', 'resend')->name('authentication.resend');
    Route::get('/offline', 'offline')->name('authentication.offline');
    Route::get('/gmail', 'getGmailPage');
    Route::post('/contact_add', 'contact_add')->name('contact_add');
    Route::post('add_to_cart', 'add_to_cart')->name('add_to_cart');
});
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/registeration', 'registeration')->name('registeration');
    Route::post('/signin', 'signin');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');
    Route::get('/verification-email/{email}', 'verificationEmail');
    Route::get('/blank-token/{email}', 'blanktoken');
    Route::get('/resend-email/{email}', 'resendemail');
    Route::post('/reset-link', 'resetLink');
    Route::get('/reset-password/{email}', 'resetPassword');
    Route::post('/password_reset', 'updatePassword');
});
Route::group(["middleware" => ["authlogin"]], function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.dashboard');
        Route::get('/logout', 'logout')->name('authentication.logout');
        Route::get('/profile', 'profile')->name('dashboard.profile');
        Route::get('/get-profile', 'get_profile')->name('dashboard.get_profile');
        Route::post('/update-profile', 'updateProfile');
        Route::put('/get-update-profile/{id}', 'getupdateProfile');
        Route::get('/change_password', 'change_password')->name('change_password');
        Route::post('/update_password', 'update_password')->name('update_password');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::delete('/remove_cart_item/{id}', 'remove_cart_item')->name('remove_cart_item');
        Route::get('change_quantity', 'change_quantity')->name('change_quantity');
        Route::post('/place_order', 'place_order')->name('place_order');
        Route::get('/order/{id}', 'order')->name('order');
    });
    Route::resources([
        'quantity' => QuantityUnitController::class,
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);
    Route::controller(ProductController::class)->group(function () {
        Route::get('/sync_products','sync_products')->name('sync_products');
        Route::get('/product_purchase', 'purchase')->name('/product/purchase');
        Route::get('/products_by_category', 'productByCategory')->name('/products_by_category');
        Route::get('/get_products_against_category/{id}', 'getProductsAgainstCategory')->name('/get_products_against_category/{id}');
        Route::get('/check_stock', 'checkStock')->name('/check_stock/{id}');
        Route::get('check_product_unit', 'checkProductUnit')->name('check_product_unit');
        Route::post('purchase_product', 'purchase_product')->name('purchase_product');
        Route::get('purchase_details', 'purchase_details')->name('purchase_details');
        Route::get('stocks', 'stocks')->name('stocks');
        Route::get('sales', 'sales')->name('sales');
        Route::get('sales_add', 'sales_add')->name('sales_add');
        Route::get('check_stock/{id}', 'check_stock')->name('check_stock/{id}');
        Route::post('add_sale', 'add_sale')->name('add_sale');
        Route::get('/editMinStock/{id}', 'editMinStock')->name('editMinStock');
        Route::put('/update_min_stock/{id}', 'update_min_stock')->name('update_min_stock');
        Route::get('edit_price', 'edit_price')->name('edit_price');
        Route::put('price_edit/{id}', 'price_edit')->name('price_edit');
        Route::post('sales_filteration', 'sales_filteration')->name('sales_filteration');
        Route::post('sales_date_fileteration', 'sales_date_fileteration')->name('sales_date_fileteration');
        Route::post('add_prices', 'add_prices')->name('add_prices');
        Route::get('/check_customer_sale/{id}', 'check_customer_sale')->name('check_customer_sale/{id}');
        Route::put('/update_sale/{id}', 'update_sale')->name('update_sale/{id}');
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'index')->name('customers');
        Route::get('orders', 'orders')->name('orders');
        Route::get('/order/details/{order_key}', 'orderDetails')->name('orderDetails');
        Route::post('orders_filteration', 'orders_filteration')->name('orders_filteration');
    });
});
