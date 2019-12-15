<?php

use Intervention\Image\Image;


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

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', 'home@index');
Route::get('/login', 'login@index');
Route::get('/logout', 'login@logout');
Route::put('/login', 'login@login');

Route::get('/register', 'register@index');
Route::put('/register', 'register@insert');

Route::get('/masterBarang', 'MasterBarang@index');
Route::put('/masterBarang', 'MasterBarang@insert');
Route::put('/masterBarang/save', 'MasterBarang@save');
Route::get('/masterBarang/eid{IdMBrg}', ['uses' => 'MasterBarang@edit']);
Route::get('/masterBarang/did{IdMBrg}', ['uses' => 'MasterBarang@delete']);

// Route::get('/masterUkuran', 'MasterUkuran@index');
// Route::put('/masterUkuran', 'MasterUkuran@insert');
// Route::put('/masterUkuran/save', 'MasterUkuran@save');
// Route::get('/masterUkuran/eid{IdMUkuran}', ['uses' => 'MasterUkuran@edit']);
// Route::get('/masterUkuran/did{IdMUkuran}', ['uses' => 'MasterUkuran@delete']);

Route::get('/masterVarian', 'MasterVarian@index');
Route::put('/masterVarian', 'MasterVarian@insert');
Route::put('/masterVarian/save', 'MasterVarian@save');
Route::get('/masterVarian/eid{IdMVarian}', ['uses' => 'MasterVarian@edit']);
Route::get('/masterVarian/did{IdMVarian}', ['uses' => 'MasterVarian@delete']);
Route::post('/masterVarian', 'MasterVarian@fetch')->name('MasterVarian.fetch');
Route::post('/masterVarian/view', 'MasterVarian@fetchView')->name('MasterVarian.fetchView');

Route::get('/barang/{IdMBrg}', ['uses' => 'ViewVarian@index']);

Route::get('/penilaianKriteria', 'PenilaianKriteria@index');
Route::put('/penilaianKriteria', 'PenilaianKriteria@insert');

Route::get('/hasilAnalisa', 'HasilAnalisa@index');
Route::post('/hasilAnalisa/view', 'HasilAnalisa@fetchView')->name('HasilAnalisa.fetchView');


Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('public/' . $filename))->response();
});
