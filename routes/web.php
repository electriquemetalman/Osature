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

Route::get('/', function () {
    return view('welcome');
});

Route::get('Connexion', 'CompteController@Compte')->name('connexion');



Route::middleware([connexion::class])->group(function () {
    Route::get('Administration', 'CompteController@Administrer')->name('index_admin_path');
    Route::get('Administration|Contact', 'ConfigurationController@Contact')->name('admin_contact_path');
    Route::post('Administration-saveContact', 'ConfigurationController@saveContact')->name('save_contact_admin_path');
    Route::get('Administration|FAQ', 'ConfigurationController@FAQ')->name('admin_faq_path');
    Route::get('Administration|deconnexion', 'CompteController@Deconnexion')->name('admin_Deconnexion_path');
});
