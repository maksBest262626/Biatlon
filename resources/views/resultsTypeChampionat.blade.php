
@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results1
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->   
<div class="row row-cols-1 row-cols-md-1 mb-2 text-center">
      <div class="col">
          
          <?php
                   
          foreach ($types as $type) {
            $russian = "Ниiзвездный забег...";
            if ($type->type == "female15")  { $russian = "Женщины. Забег на 15 км."; }
            if ($type->type == "male20")  { $russian = "Мужчины. Забег на 20 км."; }
            if ($type->type == "male10sprint")  { $russian = "Мужчины. Спринт на 10 км."; } 
            if ($type->type == "female75sprint")  { $russian = "Женщины. Спринт на 7.5 км."; }
            
            if ($type->type == "female75 sprint")  { $russian = "Женщины. Спринт на 7.5 км."; }
            if ($type->type == "male125gonka")  { $russian = "Мужчины. Гонка на 12.5 км."; }
            if ($type->type == "female4on6")  { $russian = "Женщины. Эстафета 4 подхода по 6 км."; }
            if ($type->type == "male4on75")  { $russian = "Мужчины. Эстафета 4 подхода по 7.5 км."; } 
            if ($type->type == "female10gonka")  { $russian = "Женщины. Гонка на 10 км."; }
            if ($type->type == "male15mass")  { $russian = "Мужчины. Масс-старт на 15 км."; } 
            if ($type->type == "female125mass")  { $russian = "Женщины. Масс-старт на 12.5 км."; }  
            if ($type->type == "doubleEs")  { $russian = "Смешанная эстафета"; }
            if ($type->type == "doubleES")  { $russian = "Смешанная эстафета"; } 
            if ($type->type == "doebleEs")  { $russian = "Смешанная эстафета"; } 
            if ($type->type == "oneEs")  { $russian = "Одиночная смешанная эстафета"; } 
            if ($type->type == "oneES")  { $russian = "Одиночная смешанная эстафета"; } 
            if ($type->type == "female15gonka")  { $russian = "Женщины. Гонка на 15 км."; }
            if ($type->type == "femake15oneGonka")  { $russian = "Женщины. Индивидуальная гонка на 15 км."; }
            if ($type->type == "male20gonka")  { $russian = "Мужчины. Гонка на 20 км."; } 
            if ($type->type == "male20oneGonka")  { $russian = "Мужчины. Индивидуальная гонка на 20 км."; }  
            echo "
            <br>
            <div class='container text-center' align='center' ><a href='/results/championatOfTheWorld/{$type->type}' class='btn btn-primary' align=center>
              {$russian}
            </a></div>
            <br><br>";
          }
          ?>

        
        
      </div>
    </div>
@endsection            