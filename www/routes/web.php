<?php


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\ServeyController;


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
    if(empty(Auth::user())) {
        return view('main', ['title' => 'Главная']);
    } else {
        return Redirect::to('/users/');
} })->name('main');

// bot
Route::get('/bot/', [ServeyController::class, 'index']);
Route::post('/sendMessageBot', [BotController::class, 'sendMessage']);
Route::get('/sendDocumentBot', [BotController::class, 'sendDocument']);
Route::get('/sendButtonsBot', [BotController::class, 'sendSurvey']);

Route::get('/servey/show/add/', function () { return view('bot.servey', ['title' => 'Добавить опрос']); })->middleware('auth');
Route::get('/servey/show/update/{id}', function ($id) { return view('bot.serveyupdate', ['title' => 'Обновить опрос', 'id'=> $id]); })->middleware('auth');
Route::get('/servey/show/delete/{id}', function ($id) { return view('bot.serveydelete', ['title' => 'Удалить опрос', 'id'=> $id]); })->middleware('auth');
Route::post('/servey/add/', [ServeyController::class, 'serveyAdd'])->middleware('auth');
Route::post('/servey/update/{id}', [ServeyController::class, 'serveyUpdate'])->middleware('auth');
Route::post('/servey/delete/{id}', [ServeyController::class, 'serveyDelete'])->middleware('auth');

Route::get('/servey/show/answer/{id}', function () { return view('bot.servey', ['title' => 'Просмотр ответов']); })->middleware('auth');
Route::get('/answer/show/add', function () { return view('bot.servey', ['title' => 'Добавить ответ']); })->middleware('auth');
Route::get('/answer/show/update/{id}', function ($id) { return view('bot.serveyupdate', ['title' => 'Обновить ответ', 'id'=> $id]); })->middleware('auth');
Route::get('/answer/show/delete/{id}', function ($id) { return view('bot.serveydelete', ['title' => 'Удалить ответ', 'id'=> $id]); })->middleware('auth');
Route::post('/answer/add/', [ServeyController::class, 'serveyAdd'])->middleware('auth');
Route::post('/answer/update/{id}', [ServeyController::class, 'serveyUpdate'])->middleware('auth');
Route::post('/answer/delete/{id}', [ServeyController::class, 'serveyDelete'])->middleware('auth');




// пользователи
Route::get('/registration/', function () { return view('registration', ['title' => 'Регистрация']); });

Route::get('/user/show/update/', function () { return view('user.update', ['title' => 'Изменение данных пользователя']); })->middleware('auth');
Route::get('/user/show/update-pass/', function () { return view('user.update_pass', ['title' => 'Изменение пароля пользователя']); })->middleware('auth');
Route::get('/user/show/delete/', function () { return view('user.delete', ['title' => 'Удаление пользователя']); })->middleware('auth');

Route::get('/logout/', [LoginController::class, 'logout'])->middleware('auth');
Route::match(array('GET','POST'),'/users/', [UserController::class, 'index'])->name('users');
Route::post('/user/add/', [UserController::class, 'userAdd']);
Route::post('/user/update/', [UserController::class, 'userUpdate'])->middleware('auth');
Route::post('/user/update-pass/', [UserController::class, 'userUpdatePass'])->middleware('auth');
Route::get('/user/delete/', [UserController::class, 'userDelete'])->middleware('auth');


