
@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results1
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->   
<br>
<table class="table table-hover">
  <thead>
  <tr class="table-primary">
      <th scope="col">Место</th>
      <th scope="col">Спортсмен</th>
      <th scope="col">Страна</th>
      <th scope="col">Результат</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($results as $result) {
        echo "
        <tr class='table-info'>
            <th scope='row'>{$result->position}</th>
            <td>{$result->name}</td>
            <td>{$result->country}</td>
            <td>{$result->result}</td>
        </tr>
        ";
    }
    ?>
    </tbody>
</table>
<br><br>
@endsection                   <!-- /* закрываем секцию */ -->