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

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/roles', function () {
    $roleAdmin = Role::create(['name' => 'Administrador']);
    $roleCordi = Role::create(['name' => 'Coordinador']);

    // $permission = Permission::create(['name' => 'edit articles']);
    $userAdmin = \App\Models\User::find(1);
    $userAdmin->assignRole('Administrador');
    echo ('Role Admin Ok');

    $userCordi = \App\Models\User::find(2);
    $userCordi->assignRole('Coordinador');
    echo ('Role Cordi Ok');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::group(['prefix' => 'registros', 'controller' => App\Http\Controllers\RegistroDocumentoController::class], function () {
        Route::get('/', 'index')->name('registro.index');
        Route::get('/create', 'create')->name('registro.create');
        Route::post('/store', 'store')->name('registro.store');
        Route::get('/show/{registro}', 'show')->name('registro.show');
        Route::delete('/destroy/{registro}', 'destroy')->name('registro.destroy');
    });
});
