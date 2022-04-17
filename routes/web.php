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
    // $role = Role::create(['name' => 'Coordinador']);
    // $permission = Permission::create(['name' => 'edit articles']);
    // $user = \App\Models\User::find(3);
    // $user->assignRole('Coordinador');
    // // echo ('Role Ok');
    // echo ('Asignado Role Ok');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
