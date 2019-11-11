@extends('admin.app')

@section('title','Login')

@section('content')
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="{{ route('login') }}">
                        <h1 style="color: "> SoftPan
                            <img src="cooladmin/images/icon/lupa-login-icon.png" alt="CoolAdmin">
                        </a>
                        </h1>
                    </div>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                
                                <label>E-mail</label>
                                <input class="au-input au-input--full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                            
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" name="password" placeholder="Senha" class="au-input au-input--full form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Lembrar minha senha
                                </label>
                                <label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua Senha?') }}
                                    </a>
                                    @endif
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Entrar</button>
                        </form>
                        <!-- <div class="register-link">
                            <p>
                                Don't you have account?
                                <a href="#">Sign Up Here</a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection