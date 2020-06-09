<?php

use App\Http\Controllers\DonationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::name('webhooks.mollie')->post('webhooks/mollie', 'WebHookController@handle');
Route::post('/newsletter/save', 'NewsletterController@postSave')->name('newsletter.save');

Route::post('/contact', 'ContactController@postContact')->name('contact');
Route::get('/newsletter', 'PagesController@getNewsLetter')->name('newsletter');
Route::post('/newsletter/subscribe', 'NewsletterController@postSubscribe')->name('newsletter.subscribe');


Route::get('/succes', 'PagesController@getSucces')->name('paymentSucces');
Route::get('/donations', 'PagesController@getDonations')->name('donations');
Route::get('/donations/new', 'PagesController@getCreateDonationPage')->name('donations.create');
Route::post('/donations/pay', 'DonationsController@postPreparePayment')->name('donations.pay');


Route::get('/', 'PagesController@getIndex')->name('news');
Route::get('/news', 'PagesController@getIndex')->name('news');
Route::get('/news/{id}', 'PagesController@getNewsDetailPage')->name('news.detail');
Route::post('/news/delete', 'NewsController@postDelete')->name('news.delete');
Route::post('/news/save', 'NewsController@postSave')->name('news.save');
Route::post('/news/softdelete', 'NewsController@postSoftdelete')->name('news.softdelete');


Route::get('/setlocale/{locale}', function ($locale) {
    if (in_array($locale, config()->get('app.locales'))) {
      session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){
    Route::get('/pages', 'AdminController@getIndex')->name('pages.index');

    Route::get('/pages/create', 'AdminController@getCreatePage')->name('pages.create');
    Route::get('/news/create', 'PagesController@getCreateNewsPage')->name('news.create');

    Route::post('/pages/save', 'AdminController@postSavePage')->name('pages.save');
    Route::get('/pages/edit/{page}', 'AdminController@getEditPage')->name('pages.edit');
    Route::post('/pages/delete', 'AdminController@postDeletePage')->name('pages.delete');

    Route::get('dashboard/news', 'NewsController@getAllNews')->name('admin.pages.news');
    Route::get('dashboard/news/{id}', 'NewsController@getEditDetailPage')->name('admin.pages.news.detail');

    Route::get('dashboard/donations', 'DonationsController@getAllDonations')->name('admin.pages.donations');
    Route::get('dashboard/newsletter', 'AdminController@getNewsletter')->name('admin.pages.newsletter');
    Route::post('/pages/save', 'AdminController@postSavePage')->name('pages.save');

});

Auth::routes();

Route::get('/{page}', 'PagesController@getPage')->name('page');
