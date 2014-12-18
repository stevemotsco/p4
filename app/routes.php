<?php

/* Application Routes */
/* NBaseController is handling before=>csrf filters */

/* Index */
Route::get('/', 'IndexController@getIndex');

/* User (Explicit Routing) */
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' ); 
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


Route::get('/admin',
    array(
        'before' => 'isadmin', 
        function() {
            // render admin page
        }
    )
);