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

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

// Route::get('/roles', function () {
//     // $roleAdmin = Role::create(['name' => 'Administrador']);
//     // $roleCordi = Role::create(['name' => 'Coordinador']);
//     $roleDev = Role::create(['name' => 'Developer']);

//     // $permission = Permission::create(['name' => 'edit articles']);
//     $userDev = \App\Models\User::find(1);
//     $userDev->assignRole('Developer');
//     echo ('Role Developer Ok');

//     $userAdmin = \App\Models\User::find(3);
//     $userAdmin->assignRole('Administrador');
//     echo ('Role Admin Ok');

//     $userCordi = \App\Models\User::find(4);
//     $userCordi->assignRole('Coordinador');
//     echo ('Role Cordi Ok');
// });

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::group(['prefix' => 'registros', 'controller' => App\Http\Controllers\RegistroDocumentoController::class], function () {
        Route::get('/', 'index')->name('registro.index');
        Route::get('/create', 'create')->name('registro.create')->middleware(['role:Coordinador|Developer']);
        Route::post('/store', 'store')->name('registro.store')->middleware(['role:Coordinador|Developer']);
        Route::get('/show/{registro}', 'show')->name('registro.show')->middleware(['role:Administrador|Developer']);
        Route::delete('/destroy/{registro}', 'destroy')->name('registro.destroy')->middleware(['role:Administrador|Developer']);
    });
});
