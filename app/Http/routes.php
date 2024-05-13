<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::auth();
Auth::routes();

Route::get('/clear', function() {
	\Artisan::call('route:clear');
	\Artisan::call('cache:clear');
	\Artisan::call('view:clear');
});

Route::get('/logout', 'Auth\LoginController@logout');

//Home
Route::get('/', 'HomeController@index');

//User
Route::resource('/user', 'UserController');

Route::post('/user/view_as', [
    'as'   => 'user.view_as',
    'uses' => 'UserController@view_as'
]);

Route::post('/user/return', [
    'as'   => 'user.quit_view',
    'uses' => 'UserController@quit_view'
]);

//Serie
Route::resource('/serie', 'SerieController');

//Book
Route::post('/book/inline_edit',[
    'as' => 'book.inline_edit',
    'uses' => 'BookController@inline_edit'
]);
Route::get('/book/track',[
    'as' => 'book.track',
    'uses' => 'BookController@custombook'
]);
Route::resource('/book', 'BookController');

//Promotion
Route::resource('/promotion', 'PromotionController');

//Promotion Sites
Route::resource('/promotionsite', 'PromotionSiteController');

//Purchase
Route::resource('/purchase', 'PurchaseController');

//Reports
//Statistic Inspecciones Extintor
Route::get('/report/bookhistory', 'ReportController@bookhistory');

Route::post('/report/bookhistory', [
    'as'   => 'report.bookhistory_post',
    'uses' => 'ReportController@bookhistory_post'
]);

Route::get('/report/promotionhistory', 'ReportController@promotionhistory');

Route::post('/report/promotionhistory', [
    'as'   => 'report.promotionhistory_post',
    'uses' => 'ReportController@promotionhistory_post'
]);