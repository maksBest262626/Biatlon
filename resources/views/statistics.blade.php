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
            </ul><br><br>
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
<div class="row justify-content-center">
<div class="col-4"> 
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Медальный зачёт</h4>
      </div>
      <div class="card-body">
          
            <form action = '/statistics/cupOfTheWorld/all' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Мужчины + женщины)
            </button>
            </form>
            <br>

            <form action = '/statistics/cupOfTheWorld/male' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Только мужчины)
            </button>
            </form>
            <br>
            
            <form action = '/statistics/cupOfTheWorld/maleOne' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт спортсменов (Только мужчины на индивидуальных соревнованиях)
            </button>
            </form>
            <br>

            <form action = '/statistics/cupOfTheWorld/female' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Только женщины)
            </button>
            </form>
            <br>

            <form action = '/statistics/cupOfTheWorld/femaleOne' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт спортсменов (Только женщины на индивидуальных соревнованиях)
            </button>
            </form>
            <br>

            
            <form action = '/statistics/cupOfTheWorld/mix' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Смешанные команды)
            </button>
            </form>
            <br>        
        
      </div>
    </div>
  </div> 
</div>
<br><br>
@endif

@if(Request::is('statistics/championatOfTheWorld')) 
<br>
<div class="row justify-content-center">
<div class="col-4"> 
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Медальный зачёт</h4>
      </div>
      <div class="card-body">
          
            <form action = '/statistics/championatOfTheWorld/all' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Мужчины + женщины)
            </button>
            </form>
            <br>

            <form action = '/statistics/championatOfTheWorld/male' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Только мужчины)
            </button>
            </form>
            <br>
            
            <form action = '/statistics/championatOfTheWorld/maleOne' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт спортсменов (Только мужчины на индивидуальных соревнованиях)
            </button>
            </form>
            <br>

            <form action = '/statistics/championatOfTheWorld/female' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Только женщины)
            </button>
            </form>
            <br>

            <form action = '/statistics/championatOfTheWorld/femaleOne' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт спортсменов (Только женщины на индивидуальных соревнованиях)
            </button>
            </form>
            <br>

            
            <form action = '/statistics/championatOfTheWorld/mix' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Смешанные команды)
            </button>
            </form>
            <br>        
        
      </div>
    </div>
  </div> 
</div>
<br><br>
@endif

@if(Request::is('statistics/cupOfIBU')) 
<br>
<div class="row justify-content-center">
<div class="col-4"> 
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Медальный зачёт</h4>
      </div>
      <div class="card-body">
          
            <form action = '/statistics/cupOfIBU/all' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Мужчины + женщины)
            </button>
            </form>
            <br>

            <form action = '/statistics/cupOfIBU/male' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Только мужчины)
            </button>
            </form>
            <br>
            
            <form action = '/statistics/cupOfIBU/maleOne' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт спортсменов (Только мужчины на индивидуальных соревнованиях)
            </button>
            </form>
            <br>

            <form action = '/statistics/cupOfIBU/female' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Только женщины)
            </button>
            </form>
            <br>

            <form action = '/statistics/cupOfIBU/femaleOne' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт спортсменов (Только женщины на индивидуальных соревнованиях)
            </button>
            </form>
            <br>

            
            <form action = '/statistics/cupOfIBU/mix' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
            Медальный зачёт стран (Смешанные команды)
            </button>
            </form>
            <br>        
        
      </div>
    </div>
  </div> 
</div>
<br><br>
@endif

@endsection                   <!-- /* закрываем секцию */ -->