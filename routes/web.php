<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



//Route::group(['prefix' => 'siated'], function () {

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('password.change');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('password.update');


    Route::group(['prefix' => 'formattendance', 'middleware' => 'auth'], function () {
        Route::get('/', 'FormAttendanceController@index')->name('formattendance.index');
        Route::get('/create', 'FormAttendanceController@create')->name('formattendance.create');
        Route::post('/', 'FormAttendanceController@store')->name('formattendance.store');        
        Route::get('/{id}', 'FormAttendanceController@show')->name('formattendance.show');
        Route::get('/{id}/edit', 'FormAttendanceController@edit')->name('formattendance.edit');    
        Route::put('/{id}', 'FormAttendanceController@update')->name('formattendance.update');
        Route::delete('/{id}', 'FormAttendanceController@destroy')->name('formattendance.destroy');
    }); 


    Route::group(['prefix' => 'fact'], function () {
        Route::get('/', 'factController@index')->name('fact.index');
        Route::get('/create', 'factController@create')->name('fact.create');
        Route::post('/', 'factController@store')->name('fact.store');        
        Route::get('/{id}', 'factController@show')->name('fact.show');
        Route::get('/{id}/edit', 'factController@edit')->name('fact.edit');
        Route::put('/{id}', 'factController@update')->name('fact.update');
        Route::delete('/{id}', 'factController@destroy')->name('fact.destroy');
    }); 


    Route::group(['prefix' => 'subfact'], function () {
        Route::get('/', 'SubfactController@index')->name('subfact.index');
        Route::get('/create', 'SubfactController@create')->name('subfact.create');
        Route::post('/', 'SubfactController@store')->name('subfact.store');        
        Route::get('/{id}', 'SubfactController@show')->name('subfact.show');
        Route::get('/{id}/edit', 'SubfactController@edit')->name('subfact.edit');
        Route::put('/{id}', 'SubfactController@update')->name('subfact.update');
        Route::delete('/{id}', 'SubfactController@destroy')->name('subfact.destroy');
    }); 

    Route::group(['prefix' => 'vehicletype'], function () {
        Route::get('/', 'VehicleTypeController@index')->name('vehicletype.index');
        Route::get('/create', 'VehicleTypeController@create')->name('vehicletype.create');
        Route::post('/', 'VehicleTypeController@store')->name('vehicletype.store');        
        Route::get('/{id}', 'VehicleTypeController@show')->name('vehicletype.show');
        Route::get('/{id}/edit', 'VehicleTypeController@edit')->name('vehicletype.edit');
        Route::put('/{id}', 'VehicleTypeController@update')->name('vehicletype.update');
        Route::delete('/{id}', 'VehicleTypeController@destroy')->name('vehicletype.destroy');
    }); 


    Route::group(['prefix' => 'teamfunction'], function () {
        Route::get('/', 'TeamFunctionController@index')->name('teamfunction.index');
        Route::get('/create', 'TeamFunctionController@create')->name('teamfunction.create');
        Route::post('/', 'TeamFunctionController@store')->name('teamfunction.store');        
        Route::get('/{id}', 'TeamFunctionController@show')->name('teamfunction.show');
        Route::get('/{id}/edit', 'TeamFunctionController@edit')->name('teamfunction.edit');
        Route::put('/{id}', 'TeamFunctionController@update')->name('teamfunction.update');
        Route::delete('/{id}', 'TeamFunctionController@destroy')->name('teamfunction.destroy');
    });

    Route::group(['prefix' => 'serviceteam'], function () {
        Route::get('/', 'ServiceTeamController@index')->name('serviceteam.index');
        Route::get('/create', 'ServiceTeamController@create')->name('serviceteam.create');
        Route::post('/', 'ServiceTeamController@store')->name('serviceteam.store');        
        Route::get('/{id}', 'ServiceTeamController@show')->name('serviceteam.show');
        Route::get('/{id}/edit', 'ServiceTeamController@edit')->name('serviceteam.edit');
        Route::put('/{id}', 'ServiceTeamController@update')->name('serviceteam.update');
        Route::delete('/{id}', 'ServiceTeamController@destroy')->name('serviceteam.destroy');
    }); 

    Route::group(['prefix' => 'militaryorganization'], function () {
        Route::get('/', 'MilitaryOrganizationController@index')->name('militaryorganization.index');    
        Route::get('/{id}', 'MilitaryOrganizationController@show')->name('militaryorganization.show');    
    });

    Route::group(['prefix' => 'locality'], function () {
        Route::get('/{fk}/list', 'LocalityController@index')->name('locality.index');    
        Route::get('/{id}', 'LocalityController@show')->name('locality.show');    
    });

    Route::group(['prefix' => 'militaryserver'], function () {
        Route::get('/', 'MilitaryServerController@index')->name('militaryserver.index');    
        Route::get('/{id}', 'MilitaryServerController@show')->name('militaryserver.show');    
    });

    Route::group(['prefix' => 'vehicle'], function () {
        Route::get('/', 'VehicleController@index')->name('vehicle.index');    
        Route::get('/{id}', 'VehicleController@show')->name('vehicle.show');    
    });

//}); 