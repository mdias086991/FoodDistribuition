@extends('common.base')

@section('titulo')
Dashboard    
@endsection

@section('styles_imports')
    <link rel="stylesheet" href="{{asset('css/dashboard/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard/clients/list.css')}}">
@endsection
@section('scripts_imports')
    <script src="{{asset('js/dashboard/home.js')}}"></script>
    <script src="{{asset('js/dashboard/clients/list.js')}}"></script>
    <script src="{{asset('js/dashboard/clients/create.js')}}"></script>
@endsection


@section('content')
<div class="dashboard-section">
    <header class="dashboard-header">
        <nav class="menu-dashboard">
            <div class="img-header">
                <img src="{{asset('images/mini_logo.PNG')}}" alt="">
                <h3>Dashboard</h3>
            </div>
        </nav>
    </header>
    <aside class="sidebar">
        <div class="item-sidebar">
            <a href="{{url('/home')}}"><h4>Dashboard</h4></a>
        </div>
        <div class="item-sidebar">
            <a href="{{route('create')}}"><h4>Cadastrar Clientes</h4></a>
        </div>
    </aside>
    <section class="content">
        @yield('content_dash')
    </section>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<script>
   
</script>
@endsection
