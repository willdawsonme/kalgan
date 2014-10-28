<?php

# -------------------- Filters --------------------

# Protects all POST/PUT/DELETE requests from CSRF attacks
Route::when('*', 'csrf', array('post', 'put', 'delete'));


# -------------------- Patterns --------------------

# Defines regex pattern for {id} use
Route::pattern('id', '[0-9]+');


# -------------------- Home --------------------

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


# -------------------- Auth --------------------

# Login
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);

# Logout
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);