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


Route::get('/', function () {
        $contact=adresse::get();
    return view('welcome',compact('contact'));
})->name('welcome');

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
});
