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

/**
 * Routes accessibles hors connexion
 */
Route::get('/', 'ConfigurationController@Welcome')->name('welcome');
Route::get('news', 'ConfigurationController@News')->name('news');
Route::get('detail/{id}', 'ConfigurationController@detail')->name('news');

Route::get('Connexion', 'CompteController@Compte')->name('connexion');
Route::get('Creation-Compte', 'CompteController@AddCompte')->name('addCompte');
Route::get('verificationCompte/{id}/{remember_token}', 'CompteController@Verification')->name('verification');
Route::post('send_message', 'contact@send')->name('sendMessage');
Route::get('recuperer_mot_de_passe', 'CompteController@recoverpw')->name('recoverpw');
Route::get('mot_de_pass_oublie{id}', 'CompteController@changePw')->name('ChangePw');

Route::middleware([connexion::class])->group(function () {

    /**
     * Routes juste lorsqu'on est connecté
     */
    Route::post('/news/{id}/comment', 'NewsController@comment');
    Route::get('/news/{news_id}/comment/{comments_id}', 'NewsController@reply');
    Route::post('/news/{news_id}/comment/{comments_id}', 'NewsController@replycomment');

    /**
     * Route de deconnexion pour un administrateur et un client
     */
    Route::get('Administration|deconnexion', 'CompteController@Deconnexion')->name('admin_Deconnexion_path');

    /**
     * Routes espace administrateur
     */
    Route::middleware([admin::class])->group(function () {
        Route::get('Administration', 'CompteController@Administrer')->name('index_admin_path');
        Route::get('Administration|Contact', 'ConfigurationController@Contact')->name('admin_contact_path');
        Route::post('Administration-saveContact', 'ConfigurationController@saveContact')->name('save_contact_admin_path');
        Route::get('Administration|FAQ', 'ConfigurationController@FAQ')->name('admin_faq_path');
        Route::get('Administration|Investment', 'ConfigurationController@Investment')->name('admin_Investment_path');
        Route::get('Administration|About', 'ConfigurationController@About')->name('admin_about_path');
    
        /**
         * Routes News
         */
        Route::get('/Administration|news', 'NewsController@index');
        Route::get('/news/add', 'NewsController@add');
        Route::get('/news/edit/{id}', 'NewsController@edit');
        Route::get('/news/{id}/comments', 'NewsController@listcomment');
        Route::get('/news/detail/{id}', 'NewsController@detail');
        Route::post('/news', 'NewsController@create')->name('news.store');
        Route::post('/news/update/{id}', 'NewsController@update');
        Route::delete('/news/delete/{id}', 'NewsController@destroy');
    });


    /**
     * Routes espace client
     */
    Route::middleware([client::class])->group(function () {
        Route::get('/Client', 'ClientController@Client')->name('index_client_path');
        /**
         * Routes pour le profil utilisateur
         */
        Route::get('/profile', 'ClientController@profile')->name('profile');
        Route::put('/profile/update', 'ClientController@editProfile');
        Route::put('/profile/password', 'ClientController@editPassword');

        /**
         * Gestion des comptes (Payeer, APM et Bitcoins)
         */
        Route::get('/compteUser', 'compteUserController@index')->name('compteUser');
        Route::get('/compteUser/add', 'compteUserController@add');
        Route::get('/compteUser/edit/{id}', 'compteUserController@edit');
        Route::post('/compteUser', 'compteUserController@create')->name('news.store');
        Route::post('/compteUser/update/{id}', 'compteUserController@update');
        Route::delete('/compteUser/delete/{id}', 'compteUserController@destroy');
    });

});

