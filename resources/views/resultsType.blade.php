
@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results1
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->   
<br>
<div class="row justify-content-center">
<div class="col-4"> 
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Типы Соревнований</h4>
      </div>
      <div class="card-body">
          <?php
          $types = DB::table('cup_of_the_world')->where('etap',$etap)->select('type')->distinct()->get();
          
          foreach ($types as $type) {
            $russian = "Ниiзвездный забег...";
            if ($type->type == "female15")  { $russian = "Женщины. Забег на 15 км."; }
            if ($type->type == "male20")  { $russian = "Мужчины. Забег на 20 км."; }
            if ($type->type == "male10sprint")  { $russian = "Мужчины. Спринт на 10 км."; } 
            if ($type->type == "female75sprint")  { $russian = "Женщины. Спринт на 7.5 км."; }
            if ($type->type == "male125gonka")  { $russian = "Мужчины. Гонка на 12.5 км."; }
            if ($type->type == "female4on6")  { $russian = "Женщины. Эстафета 4 подхода по 6 км."; }
            if ($type->type == "male4on75")  { $russian = "Мужчины. Эстафета 4 подхода по 7.5 км."; } 
            if ($type->type == "female10gonka")  { $russian = "Женщины. Гонка на 10 км."; }
            if ($type->type == "male15mass")  { $russian = "Мужчины. Масс-старт на 15 км."; } 
            if ($type->type == "female125mass")  { $russian = "Женщины. Масс-старт на 12.5 км."; }  
            if ($type->type == "doubleEs")  { $russian = "Смешанная эстафета"; } 
            if ($type->type == "doebleEs")  { $russian = "Смешанная эстафета"; } 
            if ($type->type == "oneEs")  { $russian = "Одиночная смешанная эстафета"; } 
            if ($type->type == "female15gonka")  { $russian = "Женщины. Гонка на 15 км."; }
            if ($type->type == "male20gonka")  { $russian = "Мужчины. Гонка на 20 км."; }  
            echo "
            <br>
            <form action = '/results/cupOfTheWorld/{$etap}/{$type->type}' method='get'>
            <button type=submit class='w-100 btn btn-lg btn-outline-primary'>
              {$russian}
            </button>
            </form>
            <br><br>";
          }
          ?>

        
      </div>
    </div>
  </div> 
</div>
<br><br>
@endsection            