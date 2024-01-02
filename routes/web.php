<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactContrller;
use App\Http\Controllers\MessageController;

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
Route::view('/groupe', 'welcome2')->name('homegroupe');
Route::view('/', 'welcome')->name('home');

Route::get('/listContactview', [ContactContrller::class,'index'])->name('listContactview');
Route::get('/listContactStagiareview', [ContactContrller::class,'indexStagiare'])->name('listContactstagiaireview');
Route::get('/listContactAdminview', [ContactContrller::class,'indexAdmine'])->name('listContactadminview');
Route::view('/addContactview', 'addContact')->name('addContactview');
Route::post('send',[MessageController::class,'sendMail'])->name('sendMail');
Route::post('sendgroup',[MessageController::class,'sendMailgroupe'])->name('sendMailgroupe');
Route::post('addContactform',[ContactContrller::class,'addContact'])->name('addContact');

Route::get('sendmailchedek/{id}',[MessageController::class,'sendmailchedek'])->name('sendmailchedek');
Route::post('sendmailchedek',[MessageController::class,'sendmailchedekstore'])->name('post.sendmailchedek');

Route::get('/sendmail/{id}',[MessageController::class,'sendMailindiv']);
