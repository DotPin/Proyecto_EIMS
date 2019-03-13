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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/workers/list', 'HomeController@getList')->name('listWorkers');
Route::get('/admin/workers/new', 'HomeController@getRegister')->name('registerWorker');
Route::post('/admin/register-worker', 'HomeController@postRegisterWorker')->name('createWorker');
Route::post('/admin/edit-worker', 'HomeController@postWorkerEdit')->name('editWorker');
Route::post('/admin/destroy-worker', 'HomeController@postWorkerDestroy')->name('deleteWorker');
Route::put('/admin/update-worker', 'HomeController@putWorkerUpdate')->name('updateWorker');

//items
Route::get('/admin/items/general-view', 'HomeController@getItemsView')->name('itemsGeneralView');
Route::get('/admin/items/management', 'HomeController@getManagement')->name('management');
Route::post('/admin/items/edit-item', 'HomeController@postItemEdit')->name('editItem');
Route::get('/admin/items/create-item', 'HomeController@getCreateItem')->name('createItem');
Route::put('/admin/items/update-item', 'HomeController@putItemUpdate')->name('updateItem');
Route::post('/admin/items/destroy', 'HomeController@postItemDestroy')->name('destroyItem');
Route::post('/admin/items/add', 'HomeController@postAddItem')->name('addItem');

//loans
Route::get('/admin/items/loans/track', 'HomeController@getTrackView')->name('trackView');
Route::post('/admin/items/loans/add', 'HomeController@postAddLoan')->name('addLoan');

//suppliers
Route::get('/admin/suppliers/management', 'HomeController@getSupManagement')->name('suppliersManagement');
Route::post('/admin/suppliers/add', 'HomeController@postAddSupplier')->name('addSupplier');
Route::post('/admin/suppliers/edit', 'HomeController@postSupplierEdit')->name('editSupplier');
Route::put('/admin/suppliers/update', 'HomeController@putUpdateSupplier')->name('updateSupplier');
Route::post('/admin/suppliers/destroy', 'HomeController@postSupplierDestroy')->name('destroySupplier');

