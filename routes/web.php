<?php

use App\Http\Livewire\AllCard;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\MyCard;
use App\Http\Livewire\CreateCard;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Settings;
use App\Http\Livewire\ShowCard;
use App\Http\Livewire\Users;
use App\Http\Livewire\VirtualReality;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard/my-card', MyCard::class)->name('my-card');
    Route::get('/dashboard/create-card', CreateCard::class)->name('create-card');
    Route::get('/dashboard/edite-card/{id}', CreateCard::class)->name('edite-card');
    Route::get('/dashboard/profile', Profile::class)->name('profile');
});


Route::middleware(['auth:sanctum', 'verified', 'CekUserStatus'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/all-card', AllCard::class)->name('all-card');
    Route::get('/dashboard/settings', Settings::class)->name('settings');
    Route::get('/dashboard/users', Users::class)->name('users');
    Route::get('/dashboard/virtual-reality', VirtualReality::class)->name('virtual-reality');
});

Route::get('/show-card/{id}', ShowCard::class);
Route::get('show-qrcode/{id}', [MyCard::class, 'ShowQr'])->name('qr-generate');
