
@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')            
Results1
@endsection 

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->   
@if(Request::is('statistics/cupOfTheWorld/femaleOne') || Request::is('statistics/cupOfTheWorld/maleOne') || Request::is('statistics/championatOfTheWorld/femaleOne') || Request::is('statistics/championatOfTheWorld/maleOne')  || Request::is('statistics/cupOfIBU/femaleOne') || Request::is('statistics/cupOfIBU/maleOne') )  
<br>
<table class="table table-hover">
  <thead>
  <tr class="table-primary">

      <th scope="col">Место</th>   
      
      <th scope="col">Спортсмен</th>
      <th scope="col">Cтрана</th>
      <th scope="col"><img src="http://спортприз.рф/system/products/images/000/010/656/original/ryjesqfi.png?1487173721" width="60" height="60" alt="1 место"></th>
      <th scope="col"><img src="http://спортприз.рф/system/products/images/000/010/660/original/jfikvdgc.png?1487173722" width="60" height="60" alt="2 место"></th>
      <th scope="col"><img src="https://nagradim.com/upload/iblock/184/akrilovaya_emblema_3_mesto.png" width="60" height="60" alt="3 место"></th>
      <th scope="col">Итог</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count = 1;
    foreach($results as $result) {
      $medal = 0;
      $mesto = 1;
      echo "
              <tr class='table-info'>
                  <th scope='row'>{$count}</th>
                  <td>{$result->name}</td>";
          foreach($resultsCountry as $resultC) {
            if(($result->name==$resultC->name) AND ($resultC->position == $mesto)AND (1== $mesto) ){
              echo "
              <td>{$resultC->country}</td>
              ";
            }
            if(($result->name==$resultC->name) AND ($resultC->position == $mesto) ){
              echo "
                  <td>{$resultC->countPos}</td>
                   ";
              $medal = $medal + $resultC->countPos ;
              $mesto++;
            } elseif (($result->name==$resultC->name)AND ($resultC->position == $mesto+1)) {
              echo "
                  <td>0</td>
                  <td>{$resultC->countPos}</td>
              ";
              $medal = $medal + $resultC->countPos ;
              $mesto++;
              $mesto++;
            } elseif ((2 == $mesto)) {
              echo "
                  <td>0</td>
              ";
              $mesto++;
            }
            elseif ((3 == $mesto)) {
              echo "
                  <td>0</td>
              ";
              $mesto++;
            }
          }
        
          if(2 == $mesto){
            echo "
            <td>0</td>
            ";
            $mesto++;
          }
          if(3 == $mesto){
            echo "
            <td>0</td>
            ";
            $mesto++;
          }
      echo "
      <td>{$medal}</td>
      </tr>";
      $count++;     
    }     
    ?>
    </tbody>
</table>
<br><br>
@else
<br>
<table class="table table-hover">
  <thead>
  <tr class="table-primary">

      <th scope="col">Место</th>   
      <th scope="col">Cтрана</th>
      <th scope="col"><img src="http://спортприз.рф/system/products/images/000/010/656/original/ryjesqfi.png?1487173721" width="60" height="60" alt="1 место"></th>
      <th scope="col"><img src="http://спортприз.рф/system/products/images/000/010/660/original/jfikvdgc.png?1487173722" width="60" height="60" alt="2 место"></th>
      <th scope="col"><img src="https://nagradim.com/upload/iblock/184/akrilovaya_emblema_3_mesto.png" width="60" height="60" alt="3 место"></th>
      <th scope="col">Итог</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count = 1;
    foreach($results as $result) {
      $medal = 0;
      $mesto = 1;
      echo "
              <tr class='table-info'>
                  <th scope='row'>{$count}</th>
                  <td>{$result->country}</td>";
          foreach($resultsCountry as $resultC) {
            if(($result->country==$resultC->country) AND ($resultC->position == $mesto) ){
              echo "
                  <td>{$resultC->countPos}</td>
              ";
              $medal = $medal + $resultC->countPos ;
              $mesto++;
            }  elseif (($result->country==$resultC->country)AND ($resultC->position == $mesto+1)) {
              echo "
                  <td>0</td>
                  <td>{$resultC->countPos}</td>
              ";
              $medal = $medal + $resultC->countPos ;
              $mesto++;
              $mesto++;
            } elseif (3 == $mesto) {
              echo "
            <td>0</td>
            ";
            $mesto++;
            } elseif ((2 == $mesto)) {
              echo "
                  <td>0</td>
              ";
              $mesto++;
            }
           
          }
          if(2 == $mesto){
            echo "
            <td>0</td>
            ";
            $mesto++;
          } 
          if (3 == $mesto){
            echo "
            <td>0</td>
            ";
            $mesto++;
          }
      echo "
      <td>{$medal}</td>
      </tr>";
      $count++;     
    }     
    ?>
    </tbody>
</table>
<br><br>
@endif
@endsection                   <!-- /* закрываем секцию */ -->