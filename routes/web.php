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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/results', function () {
    return view('results');
})->name('results');

Route::get('/statistics', function () {
    return view('statistics');
})->name('statistics');

Route::post('/results/cupOfTheWorld', function () {
    return view('results');
});

Route::post('/results/cupOfTheWorld/1', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/2', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/3', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/4', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/5', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/6', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/7', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/8', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/9', function () {
    return view('results');
});
Route::post('/results/cupOfTheWorld/10', function () {
    return view('results');
});

Route::post('/results/cupOfIBU', function () {
    return view('results');
});

Route::post('/results/championatOfTheWorld', function () {
    return view('results');
});
