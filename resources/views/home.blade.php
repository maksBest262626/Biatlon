@extends('layouts.app')

@section('title')            
Home page
@endsection

@section('content')            <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->

<br>

<div class="row justify-content-center">
<div class="col-4"> 
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Результаты</h4>
          </div>
          <div class="card-body">
          <h4>В данном разделе вы можете ознакомится с результатами важнейших соревнований по биатлону, таких как:
           </h4>
           <ul>
              <li><h4>Кубок Мира</h4></li>
              <li><h4>Чемпионат Мира</h4></li>
              <li><h4>Кубок IBU</h4></li>
            </ul><br><br>
            <form action="/results" method="get">
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Перейти к результатам</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal" align="center">Статистика</h4>
          </div>
          <div class="card-body">
          <h4>В данном разделе вы можете ознакомится со статистикой медальных зачётов по важнейшим соревнованиям по биатлону, таких как:
           </h4>
           <ul>
              <li><h4>Кубок Мира</h4></li>
              <li><h4>Чемпионат Мира</h4></li>
              <li><h4>Кубок IBU</h4></li>
            </ul><br> 
            <form action="/statistics" method="get">
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Перейти к статистике</button>
            </form>
        </div>
        </div>
      </div>
    </div>
@endsection  