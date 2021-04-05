<?php

use App\models\adresse;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'ConfigurationController@Welcome')->name('welcome');
Route::get('news', 'ConfigurationController@News')->name('news');
Route::get('detail/{id}', 'ConfigurationController@detail')->name('news');

Route::get('Connexion', 'CompteController@Compte')->name('connexion');
Route::get('Creation-Compte', 'CompteController@AddCompte')->name('addCompte');
Route::get('verificationCompte/{id}/{remember_token}', 'CompteController@Verification')->name('verification');
Route::post('send_message', 'contact@send')->name('sendMessage');

Route::middleware([connexion::class])->group(function () {
    Route::get('Administration', 'CompteController@Administrer')->name('index_admin_path');
    Route::get('Administration|Contact', 'ConfigurationController@Contact')->name('admin_contact_path');
    Route::post('Administration-saveContact', 'ConfigurationController@saveContact')->name('save_contact_admin_path');
    Route::get('Administration|FAQ', 'ConfigurationController@FAQ')->name('admin_faq_path');
    Route::get('Administration|deconnexion', 'CompteController@Deconnexion')->name('admin_Deconnexion_path');
    Route::get('Administration|Investment', 'ConfigurationController@Investment')->name('admin_Investment_path');
    Route::get('Administration|About', 'ConfigurationController@About')->name('admin_about_path');

    Route::get('/Administration|news', 'NewsController@index');
    Route::get('/news/add', 'NewsController@add');
    Route::get('/news/edit/{id}', 'NewsController@edit');
    Route::post('/news/{id}/comment', 'NewsController@comment');
    Route::get('/news/{id}/comments', 'NewsController@listcomment');
    Route::get('/news/{news_id}/comment/{comments_id}', 'NewsController@reply');
    Route::post('/news/{news_id}/comment/{comments_id}', 'NewsController@replycomment');
    Route::get('/news/detail/{id}', 'NewsController@detail');
    Route::post('/news', 'NewsController@create')->name('news.store');
    Route::post('/news/update/{id}', 'NewsController@update');
    Route::delete('/news/delete/{id}', 'NewsController@destroy');
});
