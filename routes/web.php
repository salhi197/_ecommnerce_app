<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm')->name('login.writer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm')->name('register.writer');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/writer', 'Auth\RegisterController@createWriter')->name('register.writer');

Route::view('/home', 'home')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:writer'], function () {
    Route::view('/writer', 'writer');
});


Route::group(['prefix' => 'produit', 'as' => 'produit'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'ProduitController@index']);
    Route::get('/stock', ['as' => '.stock', 'uses' => 'ProduitController@stock']);
    Route::get('/create',['as'=>'.create', 'uses' => 'ProduitController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'ProduitController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'ProduitController@destroy']);    
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'ProduitController@edit']);
    Route::get('/show/{id_produit}', ['as' => '.show', 'uses' => 'ProduitController@show']);
    Route::post('/update', ['as' => '.update', 'uses' => 'ProduitController@update']);    

});


Route::group(['prefix' => 'commande', 'as' => 'commande'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'CommandeController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'CommandeController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'CommandeController@store']);
    Route::get('/destroy/{id_commande}', ['as' => '.destroy', 'uses' => 'CommandeController@destroy']);    
    Route::get('/relancer/{id_commande}', ['as' => '.relancer', 'uses' => 'CommandeController@relancer']);    
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'CommandeController@edit']);
    Route::get('/show/{id_commande}', ['as' => '.show', 'uses' => 'CommandeController@show']);
    Route::post('/update/{id_demande}', ['as' => '.update', 'uses' => 'CommandeController@update']);    
    Route::post('/search', ['as' => '.search', 'uses' => 'CommandeController@search']);    
    Route::post('/change/state', ['as' => '.update.state', 'uses' => 'CommandeController@updateState']);
    
});

Route::group(['prefix' => 'type', 'as' => 'type'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'TypeController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'TypeController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'TypeController@store']);
    Route::post('/create/ajax', ['as' => '.store.ajax', 'uses' => 'TypeController@storeAjax']);
    Route::get('/destroy/{id_type}', ['as' => '.destroy', 'uses' => 'TypeController@destroy']);    
    Route::get('/edit/{id_type}', ['as' => '.edit', 'uses' => 'TypeController@edit']);
    Route::get('/show/{id_type}', ['as' => '.show', 'uses' => 'TypeController@show']);
    Route::post('/update/{id_type}', ['as' => '.update', 'uses' => 'TypeController@update']);    
});

Route::group(['prefix' => 'livreur', 'as' => 'livreur'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'LivreurController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'LivreurController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'LivreurController@store']);
    Route::get('/destroy/{id_livruer}', ['as' => '.destroy', 'uses' => 'LivreurController@destroy']);    
    Route::get('/change/state/{id_livruer}', ['as' => '.change.state', 'uses' => 'LivreurController@changeState']);
    Route::get('/show/{id_livruer}', ['as' => '.show', 'uses' => 'LivreurController@show']);
    Route::post('/update/{id_livruer}', ['as' => '.update', 'uses' => 'LivreurController@update']);    
    Route::get('/livraisons', ['as' => '.livraisons', 'uses' => 'LivreurController@maList']);    
    Route::get('/index/ajax', ['as' => '.ajax', 'uses' => 'LivreurController@indexAjax']);

});
