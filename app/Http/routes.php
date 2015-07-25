<?php

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

Route::get('/', 'WelcomeController@index');

Route::get('a_propos', 'WelcomeController@aboutUs');
Route::get('fonctionnement', 'WelcomeController@fonctionnement');
Route::get('contact', 'WelcomeController@contact');

Route::get('boutiques', 'WelcomeController@boutiques');
Route::get('boutique_annonces/{n}', 'WelcomeController@showBoutiquePosts');
Route::get('boutique/{n}', 'WelcomeController@showBoutique');

Route::get('offres', 'WelcomeController@offres');
Route::get('demandes', 'WelcomeController@demandes');
Route::get('annonces', 'WelcomeController@annonces');
Route::get('annonce/{n}', 'WelcomeController@showAnnonce');

Route::get('paid', 'UserController@paid');
Route::post('checkout', 'UserController@payment');
Route::get('user-posts/{n}', 'UserController@showUserPosts');
Route::get('user-profil/{n}', 'UserController@showProfil');
Route::get('user-edit-profil/{n}', 'UserController@editProfil');


Route::get('creer_compte', 'WelcomeController@creerCompte');
Route::post('enregistrer_compte', 'WelcomeController@enregistrerCompte');


Route::get('depot-annonce', 'DepotAnnonceController@getForm');
Route::post('depot-annonce', 'DepotAnnonceController@postForm');
Route::post('/indexPostValidation', 'WelcomeController@indexPostForm');


Route::resource('user','UserController');

Route::resource('post', 'PostController');



Route::get('home', '\Bestmomo\Scafold\Http\Controllers\HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/ajax-subcat', function(){
	$province_id = Input::get('province_id');
	$cities = City::where('id','=', $province_id)->get();
	return Response::json($cities);
});