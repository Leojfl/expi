<?php

Route::get('/admins', 'AdminController@index')
    ->name('admin_users_index');

Route::get('/parkings','ParkingController@index')
    ->name('admin_parking_index');

Route::get('/terms','TermsController@index')
    ->name('admin_terms_index');

Route::get('/contact','ContactController@index')
    ->name('admin_contacts_index');
