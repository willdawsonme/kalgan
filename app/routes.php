<?php

# -------------------- Filters --------------------

# Protects all POST/PUT/DELETE requests from CSRF attacks
Route::when('*', 'csrf', array('post', 'put', 'delete'));


# -------------------- Patterns --------------------

# Defines regex pattern for {id} use
Route::pattern('id', '[0-9]+');


# -------------------- Home --------------------

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex', 'before' => 'guest']);

Route::group(['before' => 'guest'], function()
{

});

Route::group(['before' => 'auth'], function()
{
    
});