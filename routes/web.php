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

Route::get('/exit', function () {
    return view('exit');
})->name('exit');

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

Route::get('/anna', function () {
    return view('anna');
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

Route::get('/statistics/cupOfTheWorld', function () {
    return view('statistics');
});

Route::get('/statistics/cupOfIBU', function () {
    return view('statistics');
});

Route::get('/statistics/championatOfTheWorld', function () {
    return view('statistics');
});
















//БЛОК СТАТИСТИКИ ДЛЯ КУБКА МИРА
Route::get('/statistics/cupOfTheWorld/all', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_world')->
    select('country', 'position',  DB::raw('IFNULL(COUNT(cup_of_the_world.position), 0) as countPos'))->
    where('position',1)->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_world')->
    select('country', 'position',  DB::raw('IFNULL(COUNT(cup_of_the_world.position), 0) as countPos'))->
    where('position', '<=', 3)->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfTheWorld/male', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_world')->
    select('country', 'position',  DB::raw('COUNT(ALL cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male4on75');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20gonka');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_world')->
    select('country', 'position', DB::raw('COUNT(ALL cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position', '<=', 3)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male4on75');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male20gonka');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfTheWorld/female', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_world')->
    select('country', 'position',  DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female4on6');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female15gonka');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_world')->
    select('country', 'position', DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female4on6');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female15gonka');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfTheWorld/femaleOne', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_world')->
    select( 'name', 'position',  DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female15gonka');
            })
            ->
    groupBy('name','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_world')->
    select('name', 'position','country', DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female15gonka');
            })
            ->
    groupBy('name','country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfTheWorld/maleOne', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_world')->
    select( 'name', 'position',  DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20gonka');
            })
            ->
    groupBy('name','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_world')->
    select('name', 'position','country', DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position', '<=', 3)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male20gonka');
            })
            ->
    groupBy('name','country','position')->
    orderBy('name','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfTheWorld/mix', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_world')->
    select('country', 'position',  DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'doebleEs');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleEs');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_world')->
    select('country', 'position', DB::raw('COUNT(cup_of_the_world.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'doebleEs');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'oneEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'doubleEs');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});























































//БЛОК СТАТИСТИКИ ДЛЯ ЧЕМПИОНАТА МИРА





Route::get('/statistics/championatOfTheWorld/all', function () {
    $view = view('statisticsTable');
    $results = DB::table('championat')->
    select('country', 'position',  DB::raw('COUNT(championat.position) as countPos'))->
    where('position',1)->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('championat')->
    select('country', 'position', DB::raw('COUNT(championat.position) as countPos'))->
    where('position', '<=', 3)->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/championatOfTheWorld/male', function () {
    $view = view('statisticsTable');
    $results = DB::table('championat')->
    select('country', 'position',  DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male4on75');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('championat')->
    select('country', 'position', DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position', '<=', 3)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male4on75');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/championatOfTheWorld/female', function () {
    $view = view('statisticsTable');
    $results = DB::table('championat')->
    select('country', 'position',  DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female4on6');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'femake15oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('championat')->
    select('country', 'position', DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female4on6');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'femake15oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/championatOfTheWorld/femaleOne', function () {
    $view = view('statisticsTable');
    $results = DB::table('championat')->
    select( 'name', 'position',  DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'femake15oneGonka');
            })
            ->
    groupBy('name','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('championat')->
    select('name', 'position','country', DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'femake15oneGonka');
            })
            ->
    groupBy('name','country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/championatOfTheWorld/maleOne', function () {
    $view = view('statisticsTable');
    $results = DB::table('championat')->
    select( 'name', 'position',  DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20oneGonka');
            })
            ->
    groupBy('name','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('championat')->
    select('name', 'position','country', DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position', '<=', 3)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20oneGonka');
            })
            ->
    groupBy('name','country','position')->
    orderBy('name','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/championatOfTheWorld/mix', function () {
    $view = view('statisticsTable');
    $results = DB::table('championat')->
    select('country', 'position',  DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'doebleEs');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneES');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleES');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('championat')->
    select('country', 'position', DB::raw('COUNT(championat.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'doebleEs');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'oneEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'doubleEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneES');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleES');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

































//БЛОК СТАТИСТИКИ ДЛЯ CUP OF IBU









Route::get('/statistics/cupOfIBU/all', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_ibu')->
    select('country', 'position',  DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where('position',1)->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_ibu')->
    select('country', 'position', DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where('position', '<=', 3)->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfIBU/male', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_ibu')->
    select('country', 'position',  DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male4on75');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_ibu')->
    select('country', 'position', DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position', '<=', 3)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male4on75');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfIBU/female', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_ibu')->
    select('country', 'position',  DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female4on6');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'femake125oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_ibu')->
    select('country', 'position', DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female4on6');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'femake125oneGonka');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfIBU/femaleOne', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_ibu')->
    select( 'name', 'position',  DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'femake125oneGonka');
            })
            ->
    groupBy('name','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_ibu')->
    select('name', 'position','country', DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'female15');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female10gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'female75sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female75 sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female125mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'female15gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'femake125oneGonka');
            })
            ->
    groupBy('name','country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfIBU/maleOne', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_ibu')->
    select( 'name', 'position',  DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male10sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15oneGonka');
            })
            ->
    groupBy('name','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_ibu')->
    select('name', 'position','country', DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position', '<=', 3)
              ->where('type', '=', 'male20');
    }) ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male10sprint2');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male125gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male15mass');
            })
            ->
            orWhere(function ($query) {
                $query->where('position', '<=', 3)
                ->where('type', '=', 'male20gonka');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'male15oneGonka');
            })
            ->
    groupBy('name','country','position')->
    orderBy('name','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});

Route::get('/statistics/cupOfIBU/mix', function () {
    $view = view('statisticsTable');
    $results = DB::table('cup_of_the_ibu')->
    select('country', 'position',  DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position',1)
              ->where('type', '=', 'doebleEs');
    }) ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneES');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleES');
            })
            ->
    groupBy('country','position')->
    orderBy('position','asc')->
    orderBy('countPos','desc')->
    get();
    $view->results = $results;

    $resultsCountry = DB::table('cup_of_the_ibu')->
    select('country', 'position', DB::raw('COUNT(cup_of_the_ibu.position) as countPos'))->
    where(function ($query) {
        $query->where('position','<=' ,3)
              ->where('type', '=', 'doebleEs');
    }) ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'oneEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position','<=' ,3)
                ->where('type', '=', 'doubleEs');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'oneES');
            })
            ->
            orWhere(function ($query) {
                $query->where('position',1)
                ->where('type', '=', 'doubleES');
            })
            ->
    groupBy('country','position')->
    orderBy('country','asc')->
    orderBy('position','asc')->
    get();
    $view->resultsCountry = $resultsCountry;
    return $view;
});
