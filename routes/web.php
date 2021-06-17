<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register'=>false]);
Route::get('/employee', function (){
    return redirect()->route('employee.dashboard');
});

Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

Route::get('user/register','FrontendController@register')->name('register.form');
Route::post('user/register','FrontendController@registerSubmit')->name('register.submit');

//Employee reg-login
Route::get('employee/login','EmployeeController@login')->name('elogin.form');
Route::post('employee/login','EmployeeController@eloginSubmit')->name('elogin.submit');
Route::get('employee/logout','EmployeeController@logout')->name('employee.logout');

Route::get('employee/register','EmployeeController@register')->name('employee.register');
Route::post('employee/register','EmployeeController@registerSubmit')->name('employee.rsubmit');

// Reset password
Route::get('password-reset', 'FrontendController@showResetForm')->name('password.reset'); 

Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');


Route::get('/','FrontendController@home')->name('home');

// Frontend Routes
Route::get('/home', 'FrontendController@index');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact/message','MessageController@store')->name('contact.store');
Route::get('product-detail/{slug}','FrontendController@productDetail')->name('product-detail');
Route::post('/product/search','FrontendController@productSearch')->name('product.search');
Route::get('/product-cat/{slug}','FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}','FrontendController@productBrand')->name('product-brand');
// Cart section
Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart')->middleware('user');
Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
Route::post('cart-update','CartController@cartUpdate')->name('cart.update');

Route::get('/cart',function(){
    return view('frontend.pages.cart');
})->name('cart');
Route::get('/checkout','CartController@checkout')->name('checkout')->middleware('user');
// Wishlist
Route::get('/wishlist',function(){
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');
Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
//Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('/income','OrderController@incomeChart')->name('product.order.income');
// Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');

// NewsLetter
Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

// Order Track
Route::get('/product/track','OrderController@orderTrack')->name('order.track');
Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');

//Jobs
Route::get('/jobs','JobController@index')->name('job.index');
Route::post('/jobs/{reg_id}','JobController@update')->name('job.update');

// Product Review
Route::resource('/review','ProductReviewController');
Route::post('product/{slug}/review','ProductReviewController@store')->name('review.store');

// POST category
Route::resource('/post-category','PostCategoryController');
// Post tag
Route::resource('/post-tag','PostTagController');
// Post
Route::resource('/post','PostController');

// Post Comment 
Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
Route::resource('/comment','PostCommentController');

// Coupon
Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');

//payment2
Route::post('/pay', 'PaymentController@pay')->name('pay');
Route::get('/order-confirm', 'PaymentController@confirm')->name('confirm');
Route::get('pay/success', 'PaymentController@success')->name('pay.success');
Route::get('pay/error' , 'PaymentController@error')->name('pay.error');


// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // user route
    Route::resource('users','UsersController');
    // Employee
    Route::resource('employees','EmployeesController');
    // Suppliers
    Route::resource('suppliers','SuppliersController');
    // Expenses
    Route::resource('expenses','ExpenseController');
    Route::get('/todays_expense','ExpenseController@todays_expense')->name('expenses.today');
    // Banner
    Route::resource('banner','BannerController');
    // Attendences
    Route::get('/take_attendence','AttendencesController@create')->name('attendences.create');
    Route::post('/add_attendence','AttendencesController@add')->name('attendences.add');
    Route::get('/all_attendences','AttendencesController@all')->name('attendences.all');
    Route::get('/edit_attendence/{att_edit}','AttendencesController@edit')->name('attendences.edit');
    Route::post('/update_attendence','AttendencesController@update')->name('attendences.update');
    Route::get('/view_attendence/{att_edit}','AttendencesController@view')->name('attendences.view');

    //Tasks
    Route::get('/assigntask','TasksController@index');

    // Salary
    Route::resource('salaries','SalariesController');
    Route::get('/pay_salary','SalariesController@pay_salary')->name('salaries.pay_salary');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');
    // Product
    Route::resource('/product','ProductController');
    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');
    // Message
    Route::resource('/message','MessageController');
    Route::get('/message/five','MessageController@messageFive')->name('messages.five');
    //Designations
    Route::resource('/designations','DesignationController');
    Route::get('/designations','DesignationController@index')->name('designation.index');
    Route::get('/designations-create','DesignationController@create')->name('designation.create');
    Route::post('/designations-store','DesignationController@store')->name('designation.store');
    Route::get('/designations-edit/{id}','DesignationController@edit')->name('designation.edit');
    Route::post('/designations-update/{id}','DesignationController@update')->name('designation.update');
    Route::post('/designations-destroy/{id}','DesignationController@destroy')->name('designation.destroy');

    //Import & export
    Route::get('/product-export','ProductController@export')->name('product.export');
    Route::get('/product-import','ProductController@importp')->name('product.importp');
    Route::post('/import','ProductController@import')->name('product.import');
    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');
    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
});

// Blog
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');





// User section start
Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
    Route::get('/','HomeController@index')->name('user');
     // Profile
     Route::get('/profile','HomeController@profile')->name('user-profile');
     Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
    //  Order
    Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
    // Product Review
    Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');
    
    // Post comment
    Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');
    
    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');

});

//Employee section
//Route::group(['prefix'=>'/employee','middleware'=>['employee']],function(){
    Route::get('/employee/dashboard','EmployeeController@dashboard')->name('employee.dashboard');
    Route::get('/employee/job', 'EmployeeController@job')->name('employee.job');
    Route::post('/employee/job', 'EmployeeController@jobsubmit')->name('employee.jobsubmit');
    
    
//});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});