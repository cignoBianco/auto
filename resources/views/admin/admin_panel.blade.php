@extends('layouts.app')

@section('content')

<?php 
/*
√ категории автотоваров
• поставщики
• пользователи
• автотовары, запчасти
• заказы
*/
?>
<h2>Admin panel</h2>
<p> Path: {{ Request::path() }} </p>
<a href="/{{ Request::path() }}/categories">Категории автотоваров</a>

@endsection