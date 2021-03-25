@extends('layouts.app')      <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('content')            <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->
 <h1>Biatlon statistics</h1> 
@endsection                   <!-- /* закрываем секцию */ -->

@section('title')            
Biatlon
@endsection  

@section('aside')
    @parent
    <h1>Dopolniteliniy tekst</h1>
@endsection