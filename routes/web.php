<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['role:admin']], function() {
    Route::resource('/user','userController');
    Route::get('/user/hapus/{id}','userController@destroy');
    Route::resource('/barang','barangController');
    Route::get('/barang/hapus/{id}','barangController@destroy');
    Route::resource('/supplier', 'SupplierController')->middleware('role:admin');
    Route::get('/supplier/hapus/{id}','SupplierController@destroy');
    Route::get('/supplier/edit/{id}','SupplierController@edit');
    Route::resource('/akun', 'AkunController');
    Route::get('/akun/hapus/{id}','AkunController@destroy');
    Route::resource('/barang','BarangController')->middleware('role:admin');
    Route::get('/barang/hapus/{id}','BarangController@destroy');
    Route::get('/barang/edit/{id}','BarangController@edit');
    Route::get('/akun/edit/{id}','AkunController@edit');
    Route::get('/setting','SettingController@index')->name('setting.transaksi')->middleware('role:admin');
    Route::get('/setting','SettingController@index')->name('setting.transaksi')->middleware('role:admin');
    Route::post('/setting/simpan','SettingController@simpan');
    Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi');
    Route::post('/sem/store', 'PemesananController@store');
    Route::get('/transaksi/hapus/{kd_brg}','PemesananController@destroy');
    Route::post('/detail/store', 'DetailPesanController@store');
    Route::post('/detail/simpan', 'DetailPesanController@simpan');
    Route::get('/pembelian', 'PembelianController@index')->name('pembelian.transaksi');
    Route::get('/pembelian-beli/{id}', 'PembelianController@edit');
    Route::post('/pembelian/simpan', 'PembelianController@simpan');
    Route::get('/pembelian/{id}', 'PembelianController@pdf')->name('cetak.order_pdf');
    //Retur 
    Route::get('/retur','ReturController@index')->name('retur.transaksi');
    Route::get('/retur-beli/{id}', 'ReturController@edit');
    Route::post('/retur/simpan', 'ReturController@simpan');
    //Laporan
    Route::resource( '/laporan' , 'LaporanController');
    Route::resource( '/stok' , 'LapStokController');
    Route::get('/laporan/faktur/{invoice}', 'PembelianController@pdf')->name('cetak.order_pdf');
    //laporan cetak
    Route::get('/laporancetak/cetak_pdf', 'LaporanController@cetak_pdf');
    });
    