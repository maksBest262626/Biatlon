@extends('layouts.app')       <!-- /* наследуем из папки лаяут шаблон апп */ -->

@section('title')
Anechka
@endsection

@section('content')           <!-- /* вставляем наш код который ниже в секцию контент(которая в апп есть ес что) */ -->
<?php
    $text = 'Hello, world!';
    dump($text);
?>
    <h1>Я Анютка</h1>
    <button onclick="alert('chocolate')">show chocolate</button>
@endsection                   <!-- /* закрываем секцию */ -->
