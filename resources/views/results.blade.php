@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->
@if(Request::is('results'))    
<h6></h6>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Кубок Мира</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li>Дата проведения: 28.11.2020—21.03.2021</li>
              <li>Дата следующего кубка: 27.11.2021-20.03.2022</li>
              <li>Место проведения: Финляндия</li>
              <li>Количество этапов: 10</li>
            </ul>
            <form action="/results/cupOfTheWorld" method="post">
            @csrf
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Посмотреть результаты</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Чемпионат Мира</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li>Дата проведения: 10.02.2021-21.02.2021</li>
              <li>Место проведения: Поклюка, Словения</li>           
            </ul>
            <form action="/results/championatOfTheWorld" method="post">
            @csrf
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Посмотреть результаты</button>
            </form>
        </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">Кубок IBU</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li>Даты проведения: 14.01.2021—14.03.2021</li>
              <li>Место проведения этапов 1-2: Цвизель, Германия</li>
              <li>Место проведения этапов 3-4: Осрблье, Словакия</li>
              <li>Место проведения этапа 5: Обертиллиах, Австрия</li>
            </ul>
            <form action="/results/cupOfIBU" method="post">
            @csrf
            <button type="submit" class="w-100 btn btn-lg btn-primary">Посмотреть результаты</button>
            </form>
        </div>
        </div>
      </div>
    </div>
@endif

@if(Request::is('results/cupOfTheWorld')) 
<h6></h6>
<div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
      <div class="col">
        <!-- <div class="card mb-4 rounded-3 shadow-sm"> -->
          <div class="card-body">
           <form action="/results/cupOfTheWorld/1" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 1</button>
            </form> <h1></h1>
            <form action="/results/cupOfTheWorld/2" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 2</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/3" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 3</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/4" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 4</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/5" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 5</button>
            </form>
        </div>
        <!-- </div> -->
      </div>
      <div class="col">
        <!-- <div class="card mb-4 rounded-3 shadow-sm border-primary"> -->
          <div class="card-body">
            <form action="/results/cupOfTheWorld/6" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 6</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/7" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 7</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/8" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 8</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/9" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 9</button>
            </form><h1></h1>
            <form action="/results/cupOfTheWorld/10" method="post">
            @csrf
            <button type="submit" class="w-50 btn btn-lg btn-primary">Этап 10</button>
            </form>
        </div>
        <!-- </div> -->
      </div>
    </div>
@endif
@if(Request::is('results/cupOfTheWorld/1'))

@endif
@endsection                   <!-- /* закрываем секцию */ -->