@extends('common.base')

@section('titulo')
Dashboard    
@endsection
@section('styles_imports')
    <link rel="stylesheet" href="{{asset('css/dashboard/simple-sidebar.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/dashboard/home.css')}}">   
    <link rel="stylesheet" href="{{asset('css/dashboard/clients/list.css')}}">   
    <link rel="stylesheet" href="{{asset('css/dashboard/clients/create.css')}}">   
    <link rel="stylesheet" href="{{asset('css/dashboard/clients/create.css')}}">   
@endsection
@section('scripts_imports')
    <script src="{{asset('js/dashboard/home.js')}}"></script>
    <script src="{{asset('js/dashboard/clients/list.js')}}"></script>
    <script src="{{asset('js/dashboard/clients/create.js')}}"></script>
    <script src="{{asset('js/dashboard/clients/wizard.js')}}"></script>
    <script src="{{asset('js/dashboard/clients/edit.js')}}"></script>
@endsection


@section('content')
<div class="d-flex" id="wrapper">
    <div class="side" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="{{asset('images/mini_logo.PNG')}}" alt="" style="width: 10rem"></div>
      <div class="list-group list-group-flush">
        <a href="{{url('/home')}}" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="{{route('create')}}" class="list-group-item list-group-item-action">Clientes</a>
      </div>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button  id="menu-toggle"><i class="fas fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Olá {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container content-sections">
          @yield('content_dash')
      </div>
    </div>
  </div>

  <script>
    $("#menu-toggle").on('click' ,(e) => {
        console.log('será');
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

@endsection
