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

Route::get('/results/cupOfTheWorld', function () {
    return view('results');
});

Route::get('/results/cupOfTheWorld/{id}', function($id) {
    $view = view('resultsType');
    $view->etap = $id;
    return $view;
});

Route::get('/results/cupOfTheWorld/{id}/{type}', function($id, $type) {
    $view = view('resultsTable');
    $results = DB::table('cup_of_the_world')->where('etap',$id)->where('type',$type)->get();
    $view->results = $results;
    return $view;
});

Route::get('/results/cupOfIBU', function () {
    return view('results');
});

Route::get('/results/championatOfTheWorld', function () {
    $view = view('resultsTypeChampionat');
    $types = DB::table('championat')->select('type')->distinct()->get();
    $view->types = $types;
    return $view;
});

Route::get('/results/championatOfTheWorld/{type}', function($type) {
    $view = view('resultsTableChampionat');
    $results = DB::table('championat')->where('type',$type)->get();
    $view->results = $results;
    return $view;
});

Route::get('/results/cupOfIBU/{id}', function($id) {
    $types = DB::table('cup_of_the_IBU')->where('etap',$id)->select('type')->distinct()->get();
    $view = view('resultsTypeIBU');
    $view->types = $types;
    $view->etap = $id;
    return $view;
});

Route::get('/results/cupOfIBU/{id}/{type}', function($id, $type) {
    $view = view('resultsTableIBU');
    $results = DB::table('cup_of_the_IBU')->where('etap',$id)->where('type',$type)->get();
    $view->results = $results;
    return $view;
});
