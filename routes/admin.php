<?php

/**=========================================
 * Admins actions
 * =========================================*/

Route::get('/admins', 'AdminController@index')
    ->name('admin_users_index');

Route::get('/{userId}/upsert/', 'AdminController@upsert')
    ->name('admin_user_upsert');

Route::post('/{userId}/upsert/', 'AdminController@upsertPost')
    ->name('admin_user_create_post');

Route::get('/{userId}/update-status/', 'AdminController@updateStatus')
    ->name('admin_user_update_status');

/**=========================================
 * Admins parking
 * =========================================*/


Route::get('/parkings', 'ParkingController@index')
    ->name('admin_parking_index');


/**=========================================
 * Admins terms
 * =========================================*/

Route::get('/terms', 'TermsController@index')
    ->name('admin_terms_index');

Route::post('/terms-upsert', 'TermsController@update')
    ->name('terms_upsert');
/**=========================================
 * Admins contact
 * =========================================*/

Route::get('/contact', 'ContactController@index')
    ->name('admin_contacts_index');




