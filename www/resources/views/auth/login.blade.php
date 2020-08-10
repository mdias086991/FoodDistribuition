@extends('common.base')
@section('title')
    Login
@endsection
@section('styles_imports')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">    
@endsection
@section('scripts_imports')
    <script src="{{asset('js/login.js')}}"></script>
@endsection
@section('content')
<div class="login-section">
    <div class="image links" id="image">
        <img src="{{asset('images/logo_food.PNG')}}" alt="Imagem Logo">
        <p onclick="side()" id="button-access">Acesse</p>
    </div>
    <div class="card-login">
        <div class="login-form">
            <div class="login-header">
                <h3>Login</h3>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="email label">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="email-input">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class=" password label">
                    <label for="password">{{ __('Password') }}</label>

                    <div class="password-input">
                        <input id="password" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="login-button">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
