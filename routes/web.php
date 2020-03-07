<?php
// Route::get('/', function () {
//     return "welcome";
// });
//requird route with dynamic method;
// Route::get('welcome/{name}',function($name){
//  return 'welcome'.$name;
// });

// Optional route with dynamic method;
// Route::get('welcome/{name?}',function ($name='user'){
// return 'welcome'.$name;
// });
//Route::view('/','welcome',['name'=>'shahid Minhas','compnay'=>'at Tecfare']);
// Route::redirect('/','home');
// Route::get('/home', function () {
//     return 'welcome to home Page';
// });

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@welcome');
//Route::resource('welcome','WelcomeController');
//Resource Controller for CMS (Content Mangement System)
Route::prefix('admin')->middleware('auth')->group(function(){
Route::view('/','dashboard.admin');
Route::resource('posts','PostController');
Route::resource('profile','UserProfileController');
Route::resource('users','UserController');
Route::resource('pages','PageController');
Route::resource('categories','CategoryController');
Route::resource('roles','RoleController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
