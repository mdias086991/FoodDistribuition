@extends('common.base')
@section('title')
    FoodDistribuition  
@endsection
@section('styles_imports')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Gerencie os clientes</a>
                @else
                    <a href="{{ route('login') }}">Acesse para começar a gerenciar seus clientes</a>
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <img src="{{asset('images/logo_food.PNG')}}" alt="">
            </div>

            <div class="links">
                <h3 class="text-maintenance">Site em construção</h3>
            </div>
        </div>
    </div>
@endsection
        

