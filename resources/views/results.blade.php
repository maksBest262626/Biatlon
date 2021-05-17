@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->
@if(Request::is('results'))    
<br>
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
            </ul><br><br>
            <form action="/results/cupOfTheWorld" method="get">
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
            <form action="/results/championatOfTheWorld" method="get">
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
            <form action="/results/cupOfIBU" method="get">    
            <button type="submit" class="w-100 btn btn-lg btn-primary">Посмотреть результаты</button>
            </form>
        </div>
        </div>
      </div>
    </div>
    <br><br>
@endif

@if(Request::is('results/cupOfTheWorld')) 
<br>
<div class="row justify-content-center">
<div class="col-4"> 
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Этапы 1-5</h4>
      </div>
      <div class="card-body">
          <?php
          $etaps = DB::table('cup_of_the_world')->select('etap')->distinct()->get();
          $count = 0;
          foreach ($etaps as $etap) {$count++;}
          $count/=2;
          for($i=0; $i<$count;$i++){
            echo "
            <br>
            <form action = '/results/cupOfTheWorld/{$etaps[$i]->etap}' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
              Этап {$etaps[$i]->etap}
            </button>
            </form>
            <br>";
          }
          ?>
           
      </div>
    </div>
  </div> 
      <div class="col-4">    
       <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Этапы 6-10</h4>
          </div>
          <div class="card-body">
          <?php
          $etaps = DB::table('cup_of_the_world')->select('etap')->distinct()->get();
          $count = 0;
          foreach ($etaps as $etap) {$count++;}
          $count/=2;
          for($i=$count; $i<$count*2;$i++){
            echo "
            <br>
            <form action = '/results/cupOfTheWorld/{$etaps[$i]->etap}' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
              Этап {$etaps[$i]->etap}
            </button>
            </form>
            <br>";
          }
          ?>
           
        </div>
        </div>
      </div> 
      </div>
    </div>    
    <br><br>  
@endif

@if(Request::is('results/cupOfIBU')) 
    <br>
<div class="row justify-content-center">
  <div class="col-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Этапы</h4>
      </div>
      <div class="card-body">
          <?php
          $etaps = DB::table('cup_of_the_IBU')->select('etap')->distinct()->get();
          $count = 0;
          foreach ($etaps as $etap) {$count++;}
         
          for($i=0; $i<$count;$i++){
            echo "
            <br>
            <form action = '/results/cupOfIBU/{$etaps[$i]->etap}' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
              Этап {$etaps[$i]->etap}
            </button>
            </form>
            <br>";
          }
          ?>
           
      </div>
    </div>
  </div>   
</div>
<br><br>
@endif

@endsection                   <!-- /* закрываем секцию */ -->