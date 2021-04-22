<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackController;

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

Route::get('/logout', [UserController::class, 'getLogout']);

//List

Route::get('/home/staff/list', [BackController::class, 'staff_list']);
Route::get('/home/users/list', [BackController::class, 'users_list']);

Route::get('/home/buses/list', [BackController::class, 'buses_list']);

Route::get('/home/chuyen/list', [BackController::class, 'chuyen_list']);

Route::get('/home/xe/list', [BackController::class, 'xe_list']);

Route::get('/home/dongia/list', [BackController::class, 'dongia_list']);

Route::get('/home/dongialuong/list', [BackController::class, 'dongialuong_list']);

Route::get('/home/lichchay/list', [BackController::class, 'lichchay_list']);

Route::get('/home/vexe/list', [BackController::class, 'banve_list']);


//Delete
Route::get('/home/staff/delete{NV_Ma}', [BackController::class, 'Delete_NV']);

Route::get('/home/buses/delete{TD_Ma}', [BackController::class, 'Delete_TD']);

Route::get('/home/xe/delete{BienSo}', [BackController::class, 'Delete_Xe']);

Route::get('/home/chuyen/delete{TD_Ma}+{Gio}', [BackController::class, 'Delete_Chuyen']);

Route::get('/home/dongia/delete{TD_Ma}+{Ngay}', [BackController::class, 'Delete_DG']);

Route::get('/home/dongialuong/delete{VTCT_Ma}+{Ngay}', [BackController::class, 'Delete_DGL']);

Route::get('/home/lichchay/delete{ID}', [BackController::class, 'Delete_LC']);

Route::get('/home/vexe/delete{Ve_SoHieu}', [BackController::class, 'Delete_VX']);

//Add

Route::post('/add_NV', [BackController::class,'post_add_NV']);

Route::post('/add_TX', [BackController::class,'post_add_TX']);

Route::post('/add_DGL', [BackController::class,'post_add_DGL']);

Route::post('/add_TD', [BackController::class,'post_add_TD']);

Route::post('/add_Xe', [BackController::class,'post_add_Xe']);

Route::post('/add_Chuyen', [BackController::class,'post_add_Chuyen']);

Route::post('/add_DG', [BackController::class,'post_add_DG']);

Route::post('/add_lc', [BackController::class,'post_add_lc']);

Route::post('/add_ve', [BackController::class,'post_add_ve']);

//Edit
Route::get('/home/staff/edit{NV_Ma}', [BackController::class, 'getNhanVienById']);
Route::post('/editNV', [BackController::class, 'update_NV']);

Route::get('/editTD/{TD_Ma}', [BackController::class, 'getTuyenDuongById']);
Route::post('/editTD', [BackController::class, 'update_TD']);

Route::get('/editDGL/{VTCT_Ma}+{Ngay}', [BackController::class, 'getDonGiaLuongById']);
Route::post('/editDGL', [BackController::class, 'update_DGL']);

Route::get('/editDG/{TD_Ma}+{Ngay}', [BackController::class, 'getDonGiaById']);
Route::post('/editDG', [BackController::class, 'update_DG']);

Route::get('/editXe/{BienSo}', [BackController::class, 'getXeById']);
Route::post('/editXe', [BackController::class, 'update_Xe']);

Route::get('/home/lichchay/edit{ID}', [BackController::class, 'getLichChayById']);
Route::post('/editLC', [BackController::class, 'update_LC']);

Route::get('/home/vexe/edit{Ve_SoHieu}', [BackController::class, 'getVeById']);
Route::post('/editVe', [BackController::class, 'update_Ve']);