<?php
/**=========================================
 * SPECIAL USERS
 * =========================================*/

Route::get('/special-users',
    'UserController@index')
    ->name('parking_special_users_index');


Route::get('/pension-user',
    'UserController@index')
    ->name('parking_pension_users_index');



Route::get('/user/update/{userId?}',
    'UserController@upsert')
    ->name('parking_user_special_upsert');


Route::post('/user/update/{userId?}',
    'UserController@upsertPost')
    ->name('parking_user_special_upsert_post');


Route::get('/user/{userId?}/update-status',
    'UserController@updateStatus')
    ->name('parking_user_update_status');


/**=========================================
 *    TARIFFS
 * =========================================*/

Route::get('/tariffs',
    'TariffController@index')
    ->name('parking_tariffs_index');

/**=========================================
 * CONSULTS
 * =========================================*/

Route::get('/queries',
    'QueryController@index')
    ->name('parking_graphics_index');
