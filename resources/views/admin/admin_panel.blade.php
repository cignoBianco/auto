@extends('adminlte::page')

@section('title', 'Auto Show')




@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="w-100">
            <a href="create-category" class="btn btn-secondary shadow p-3 mb-3 rounded">Перейти на сайт</a>

            <div class="card ">
                <div class="card-header bg-dark text-white card-title h4">{{ __('Admin panel') }}</div>

                <div class="card-body d-flex flex-column"> 
<a href="/{{ Request::path() }}/categories">Категории автотоваров</a>
<a href="/{{ Request::path() }}/providers">Поставщики</a>
<a href="/{{ Request::path() }}/users">Пользователи</a>
<a href="/{{ Request::path() }}/products">Автотовары</a>
<a href="/{{ Request::path() }}/parts">Запчасти</a>
<a href="/{{ Request::path() }}/categories">Заказы</a>
          </div>
            </div>   </div></div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop