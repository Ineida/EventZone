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

Route::get('/', function () {
    return view('home');
});

Route::get('/listePrestataire','PrestataireController@getPrestataires');
Route::get('/Prestataire/{id}','PrestataireController@getPrestataire')->where('id', '[0-9]+');
Route::get('/listePrestataire/{ville}','PrestataireController@ggetPrestatairesParVille');
Route::get('/listePrestataire/{profession}','PrestataireController@getPrestatairesParProfession');
Route::get('/Acueil','PrestataireController@Acueil');
Route::get('/InscrirePrestataire','PrestataireController@InscrirePrestataire');
Route::post('/saisiePrestataire','PrestataireController@postInscrirePrestataire');

Route::get('/listeEtablissement','EtablissementController@getEtablissements');
Route::get('/listeEtablissement/{ville}','EtablissementController@getEtablissementsParVille');
Route::get('/listeEtablissemen/{profession}','EtablissementController@getEtablissementsParProfession');
Route::get('/Etablissement/{id}','EtablissementController@getEtablissement')->where('id', '[0-9]+');
Route::get('/InscrireEtablissement','EtablissementController@InscrireEtablissement');
Route::post('/saisieEtablissement','EtablissementController@postInscrireEtablissement');

Route::get('/Client/{id}','ClientController@getClient')->where('id', '[0-9]+');
Route::get('/AjouterAnnonce','ClientController@AjouterAnnonce');
Route::post('/saisieAnnonce','ClientController@postAjouterAnnonce');
Route::get('/AjouterCommentaire','ClientController@AjouterCommentaire');
Route::post('/saisieCommentaire','ClientController@postAjouterCommentaire');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
