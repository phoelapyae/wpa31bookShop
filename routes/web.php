<?php

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

use App\Author;
use App\Book;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Showing login Form
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/customer', 'Auth\LoginController@showCustomerLoginForm');

// Showing register form 
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/customer', 'Auth\RegisterController@showCustomerRegisterForm');

// Check login 
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/customer', 'Auth\LoginController@customerLogin');

// Create new register
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/customer', 'Auth\RegisterController@createCustomer');

// Front End Routes
Route::get('/','HomeController@index');

Route::resource('newFeedback','FeedbackController');

Route::get('/book/data','BookController@anyData');  

Route::group(['prefix' => config("backend.frontend_link"), 'middleware' => 'auth:web,customer'], function(){
    Route::get('/order', 'OrderController@create');

    Route::resource('newOrder','OrderController');
});

// Backend routes
Route::group(['prefix' => config("backend.backend_link"), 'middleware' => 'auth:web,admin'], function(){
    Route::get('/admin', 'AdminController@index');

    // Route for Roles
    Route::get('/role/data','RoleController@anyData')->name('role.data');
    Route::resource('role','RoleController');

    // Routes for Book
    Route::get('/book/data','BookController@anyData')->name('book.data');
    Route::resource('book','BookController'); 

    // Routes for Category
    Route::get('/category/data','CategoryController@anyData')->name('category.data');
    Route::resource('category','CategoryController'); 

    // Routes for Publisher
    Route::get('/publisher/data','PublisherController@anyData')->name('publisher.data');
    Route::resource('publisher','PublisherController'); 

    // Routes for Author
    Route::get('/author/data','AuthorController@anyData')->name('author.data');
    Route::resource('author','AuthorController'); 

    // Routes for City
    Route::get('/city/data','CityController@anyData')->name('city.data');
    Route::resource('city','CityController');

    // Routes for Shop
    Route::get('/shop/data','ShopController@anyData')->name('shop.data');
    Route::resource('shop','ShopController');

    // Routes for customer
    Route::get('/customer/data','CustomerController@anyData')->name('customer.data');
    Route::resource('customer','CustomerController');

    // Routes for orders in the backend
    Route::get('/orders/data','OrderAdminController@anyData')->name('orders.data');
    Route::resource('orders','OrderAdminController');

    // Routes for feedback
    Route::get('/feedback/data','FeedbackAdminController@anyData')->name('feedback.data');
    Route::resource('feedback','FeedbackAdminController');

    // Routes for Report chart
    Route::get('/reports','ReportController@index');

    // Routes for voucher
    Route::get('/voucher/pdf','VoucherController@downloadPDF');
    Route::resource('voucher','VoucherController');

    // Routes for administrators
    Route::get('/administrator/data','AdminListController@anyData')->name('administrator.data');
    Route::resource('administrator','AdminListController');
});
