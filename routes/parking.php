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
