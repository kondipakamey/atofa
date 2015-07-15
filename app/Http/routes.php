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
Route::get('boutiques', 'WelcomeController@boutiques');
Route::get('boutique/{n}', 'WelcomeController@showBoutique');
Route::get('creer_compte', 'WelcomeController@creerCompte');
Route::post('enregistrer_compte', 'WelcomeController@enregistrerCompte');


Route::get('depot-annonce', 'DepotAnnonceController@getForm');
Route::post('depot-annonce', 'DepotAnnonceController@postForm');
Route::post('/indexPostValidation', 'WelcomeController@indexPostForm');

Route::resource('user','UserController');

Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);



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