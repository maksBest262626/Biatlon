
@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results1
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->   
<br>
<table class="table table-hover">
  <thead>
  <tr class="table-primary">
      <th scope="col">Cтрана</th>
      <th scope="col"><img src="https://png.pngtree.com/element_our/20200611/ourmid/pngtree-first-prize-medal-image_2253116.jpg" alt="1 место"></th>
      <th scope="col"><img src="https://img1.freepng.ru/20171221/tvw/silver-medal-transparent-png-clip-art-image-5a3bf6b3d4c990.0943134815138792198716.jpg" alt="2 место"></th>
      <th scope="col"><img src="https://img1.freepng.ru/20171221/hfe/bronze-medal-transparent-png-clip-art-image-5a3bf6afe1e669.4078132715138792159253.jpg" alt="3 место"></th>
      <th scope="col">Итог</th>
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