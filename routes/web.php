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


Auth::routes();

// Followers
Route::post('follow/{user}', function($user){
    auth()->user()->following()->toggle($user);
});

// Articles
Route::get('/','ArticleController@index');
Route::get('/a/edit/{article}', 'ArticleController@edit')->name('article.edit');
Route::delete('/a/{article}', 'ArticleController@destroy');
Route::patch('/a/{article}', 'ArticleController@update');
Route::get('/a/create','ArticleController@create');
Route::get('/a/{article}', 'ArticleController@show')->name("article.show");
Route::post('/a','ArticleController@store');
Route::get('/a','ArticleController@index');


// User
Route::get('/redirect/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\LoginController@handleProviderCallback');

Route::get('/user/a/{user}', 'UserController@ownArticles');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::delete('/user/{user}', 'UserController@destroy')->name('user.delete');
Route::get('/user/{user}', 'UserController@show')->name('user.show');
Route::get('/user/{user}/{show}', 'UserController@show');
Route::get('/user','UserController@index');
Route::patch('/user/edit', 'UserController@update')->name('user.update');
Route::get('/c', 'CategoryController@create');
Route::post ( '/search/{text}', function ($text) {
    if($text==""||$text==" "||$text==null)
    return [];
    $articles = \App\Article::select("title","id","views")->where ( 'title', 'LIKE', '%' . $text . '%' )->orWhere ( 'description', 'LIKE', '%' . $text . '%' )->orderBy("views","DESC")->take(4)->get();
    return $articles;
    // $q = Input::get ( 'q' );
    // $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
    // if (count ( $user ) > 0)
    //     return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    // else
    //     return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );