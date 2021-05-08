@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->
@if(Request::is('statistics'))    
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
            </ul>
            <form action="/statistics/cupOfTheWorld" method="get">
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Посмотреть медальный зачет</button>
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
            <form action="/statistics/championatOfTheWorld" method="get">
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Посмотреть медальный зачет</button>
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
            <form action="/statistics/cupOfIBU" method="get">    
            <button type="submit" class="w-100 btn btn-lg btn-primary">Посмотреть медальный зачет</button>
            </form>
        </div>
        </div>
      </div>
    </div>
@endif

@if(Request::is('statistics/cupOfTheWorld')) 
<br>
<div class="row row-cols-1 row-cols-md-1 mb-2 text-center">
      <div class="col">
          
            <br> <br> <br>
            <div class='container text-center' align='center' ><a href='/statistics/cupOfTheWorld/male' class='btn btn-primary' align=center>
            Медальный зачёт стран (Только мужчины)
            </a></div>
            <br>
            
            <div class='container text-center' align='center' ><a href='/statistics/cupOfTheWorld/female' class='btn btn-primary' align=center>
            Медальный зачёт стран (Только женщины)
            </a></div>
            <br>

            <div class='container text-center' align='center' ><a href='/statistics/cupOfTheWorld/all' class='btn btn-primary' align=center>
            Медальный зачёт стран (Мужчины + женщины)
            </a></div>
            <br>

            <div class='container text-center' align='center' ><a href='/statistics/cupOfTheWorld/mix' class='btn btn-primary' align=center>
            Медальный зачёт стран (Смешанные команды)
            </a></div>
            <br>
            <div class='container text-center' align='center' ><a href='/statistics/cupOfTheWorld/maleOne' class='btn btn-primary' align=center>
            Медальный зачёт спортсменов (Только мужчины на индивидуальных соревнованиях)
            </a></div>
            <br>
            
            <div class='container text-center' align='center' ><a href='/statistics/cupOfTheWorld/femaleOne' class='btn btn-primary' align=center>
            Медальный зачёт спортсменов (Только женщины на индивидуальных соревнованиях)
            </a></div>
            <br>
          }

        
        
      </div>
      
    </div>
@endif

@if(Request::is('statistics/cupOfIBU')) 
<br>
<div class="row row-cols-1 row-cols-md-1 mb-2 text-center">
      <div class="col">
          
          <?php
          $etaps = DB::table('cup_of_the_IBU')->select('etap')->distinct()->get();
          $count = 0;
          foreach ($etaps as $etap) {$count++;}
         
          for($i=0; $i<$count;$i++){
            echo "
            <br>
            <div class='container text-center' align='center' ><a href='/statistics/cupOfIBU/{$etaps[$i]->etap}' class='btn btn-primary' align=center>
              этап {$etaps[$i]->etap}
            </a></div>
            <br>";
          }
          ?>
      </div>
      
    </div>
@endif

@endsection                   <!-- /* закрываем секцию */ -->