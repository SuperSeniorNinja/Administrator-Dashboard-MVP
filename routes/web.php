<?php

use App\Address;
use App\Car;
use App\Owner;
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

Route::get('owner', 'OwnerController@index');
Route::get('owner_statistics', 'OwnerController@owner_statistics');
Route::get('owner/{owner}', 'OwnerController@show');
Route::get('owner/edit/{owner}', 'OwnerController@show');
Route::post('owner', 'OwnerController@store');
Route::put('owner/{owner}', 'OwnerController@update')->name("saveOwner");
Route::delete('owner/{owner}', 'OwnerController@delete');

Route::get('address', 'AddressController@index');
Route::get('address_statistics', 'AddressController@address_statistics');
Route::get('address/{address}', 'AddressController@show');
Route::post('address', 'AddressController@store');
Route::put('address/{address}', 'AddressController@update')->name("saveAddress");;
Route::delete('address/{address}', 'AddressController@delete');

Route::get('car', 'CarController@index');
Route::get('car/{car}', 'CarController@show');
Route::post('car', 'CarController@store');
Route::put('car/{car}', 'CarController@update');
Route::delete('car/{car}', 'CarController@delete');

Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');
