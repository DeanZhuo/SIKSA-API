<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'cabang' => 'CabangController', //basic ok
    'customer' => 'CustomerController', //basic ok
    'detailJasa' => 'DetailJsController', //basic ok
    'detailPengadaan' => 'DetailPdaController', //basic ok
    'detailTransaksi' => 'DetailTrController', //basic ok
    'barangKeluar' => 'HBKeluarController', //basic ok
    'barangMasuk' => 'HBMasukController', //basic ok
    'jasa' => 'JasaController', //basic ok
    'kendaraan' => 'KendaraanController', //basic ok
    'motor' => 'MotorController', //basic ok
    'pegawai' => 'PegawaiController', //basic ok
    'pengadaan' => 'PengadaanController', //
    'role' => 'RoleController', //basic ok
    'status' => 'StatusController', //basic ok
    'supplier' => 'SupplierController', //basic ok
    'sparepart' => 'SparepartController', //basic ok
    'transaksi' => 'TransaksiController', //basic ok
]);

Route::post('Login', 'AuthController@Login'); //ok
Route::put('PasswordChange/{id}', 'AuthController@PasswordChange'); //ok

Route::get('pegawaiByRole/{id}', 'PegawaiController@pegawaiByRole'); //if null, empty

Route::get('transaksiLunas/{lunas}', 'TransaksiController@getTransaksiByLunas');//if null, empty
Route::get('transByCus/{id}', 'TransaksiController@getTransaksiByCustomer');//if null, empty
Route::post('historyCustomer','TransaksiController@getHistory');
Route::get('transaksiMax','TransaksiController@getMaxId'); //ok

Route::get('detTrByTrans/{id}', 'DetailTrController@getByTransaksi');//if null, empty
Route::get('detTrMax','DetailTrController@getMaxId'); //ok

Route::get('cusByNum/{number}', 'CustomerController@getByNo'); //ok

Route::post('kendaraanByNum','KendaraanController@getByPlat'); //ok

Route::get('pengadaanMax','PengadaanController@getMaxId'); //ok
Route::get('proBySup/{id}', 'PengadaanController@getBySup');//if null, empty

Route::get('minSparepart/{numberOf}','SparepartController@getMin'); //ok

Route::get('detailByPengadaan/{id}','DetailPdaController@getByPengadaan');//if null, empty

Route::get('supplierByPengadaan/{id}','SupplierController@getByPengadaan');

Route::post('uploader','SparepartController@uploader');