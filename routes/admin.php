<?php

/**=========================================
 * Admins actions
=========================================*/

Route::get('/admins', 'AdminController@index')
    ->name('admin_users_index');

Route::get('/admin/create', 'AdminController@create')
    ->name('admin_user_create');

Route::post('/admin/create', 'AdminController@createPost')
    ->name('admin_user_create_post');

/**=========================================
 * Admins parking
=========================================*/


Route::get('/parkings', 'ParkingController@index')
    ->name('admin_parking_index');



/**=========================================
 * Admins terms
=========================================*/

Route::get('/terms', 'TermsController@index')
    ->name('admin_terms_index');



/**=========================================
 * Admins contact
=========================================*/

Route::get('/contact', 'ContactController@index')
    ->name('admin_contacts_index');
