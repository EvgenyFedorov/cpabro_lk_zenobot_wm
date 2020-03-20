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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', 'HomeController@index')->name('home');

Route::post('/api/auth', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/access-denied', 'User\\UserController@accessDenied')->name('home');

//Route::resource('/', 'User\\CabinetController')->names('/');

Route::group(array('prefix' => '/', 'middleware' => 'auth'), function (){

    Route::get('/', [
        'uses' => 'User\\Webmaster\\CabinetUsersController@redirect',
        'middleware' => 'auth'
    ]);

    Route::group(array('prefix' => 'logs', 'middleware' => 'auth'), function (){

        Route::get('', [
            'uses' => 'User\\Webmaster\\CabinetLogsController@index',
            'middleware' => 'auth'
        ]);

        Route::group(array('prefix' => 'create', 'middleware' => 'auth'), function (){

            Route::get('', [
                'uses' => 'User\\Webmaster\\CabinetLogsController@create',
                'middleware' => 'auth'
            ]);

        });

        Route::group(array('prefix' => 'store', 'middleware' => 'auth'), function (){

            Route::post('', [
                'uses' => 'User\\Webmaster\\CabinetLogsController@store',
                'middleware' => 'auth'
            ]);

        });

//        Route::group(array('prefix' => 'edit', 'middleware' => 'auth'), function (){
//
//            Route::group(array('prefix' => '{id}', 'middleware' => 'auth'), function (){
//
//                Route::get('', [
//                    'uses' => 'User\\Webmaster\\CabinetLogsController@edit',
//                    'middleware' => 'auth'
//                ]);
//
//            });
//
//        });

        Route::group(array('prefix' => 'update', 'middleware' => 'auth'), function (){

            Route::group(array('prefix' => '{id}', 'middleware' => 'auth'), function (){

                Route::post('', [
                    'uses' => 'User\\Webmaster\\CabinetLogsController@update',
                    'middleware' => 'auth'
                ]);

            });

        });

        Route::group(array('prefix' => 'enable', 'middleware' => 'auth'), function (){

            Route::post('', [
                'uses' => 'User\\Webmaster\\CabinetLogsController@enableLog',
                'middleware' => 'auth'
            ]);

        });

    });


    Route::group(array('prefix' => 'users', 'middleware' => 'auth'), function (){

        Route::get('', [
            'uses' => 'User\\Webmaster\\CabinetUsersController@index',
            'middleware' => 'auth'
        ]);

        Route::group(array('prefix' => 'create', 'middleware' => 'auth'), function (){

            Route::get('', [
                'uses' => 'User\\Webmaster\\CabinetUsersController@create',
                'middleware' => 'auth'
            ]);

        });

        Route::group(array('prefix' => 'store', 'middleware' => 'auth'), function (){

            Route::post('', [
                'uses' => 'User\\Webmaster\\CabinetUsersController@store',
                'middleware' => 'auth'
            ]);

        });

        Route::group(array('prefix' => 'edit', 'middleware' => 'auth'), function (){

            Route::group(array('prefix' => '{id}', 'middleware' => 'auth'), function (){

                Route::get('', [
                    'uses' => 'User\\Webmaster\\CabinetUsersController@edit',
                    'middleware' => 'auth'
                ]);

            });

        });

        Route::group(array('prefix' => 'update', 'middleware' => 'auth'), function (){

            Route::group(array('prefix' => '{id}', 'middleware' => 'auth'), function (){

                Route::post('', [
                    'uses' => 'User\\Webmaster\\CabinetUsersController@update',
                    'middleware' => 'auth'
                ]);

            });

        });

        Route::group(array('prefix' => 'enable', 'middleware' => 'auth'), function (){

            Route::post('', [
                'uses' => 'User\\Webmaster\\CabinetUsersController@enableUser',
                'middleware' => 'auth'
            ]);

        });

    });

});

Route::group(array('prefix' => 'api', 'middleware' => 'auth'), function (){

    Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function (){

        Route::group(array('prefix' => 'helper', 'middleware' => 'auth'), function (){

            Route::post('change_program', [
                'uses' => 'User\\SupperAdmin\\CabinetProgramsController@changeProgram',
                'middleware' => 'auth'
            ]);

        });

    });

});
