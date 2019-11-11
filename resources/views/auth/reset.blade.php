@extends('admin.home')

@section('title', '- Redefinir Senha')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8">

                    @if(session('msg-error'))
                    <div class="alert alert-danger">
                        <p>{{session('msg-error')}}</p>
                    </div>
                    @elseif(session('msg-success'))
                    <div class="alert alert-success">
                        <p>{{session('msg-success')}}</p>
                    </div>
                    @endif

                    <script>
                        setTimeout(function() {
                        $('.alert').fadeOut('slow');
                     }, 6000);
                    </script>

                    <div class="card">
                        <div class="card-header">Redefinir Senha</div>
                        <div class="card-body">
                            <div class="login-content">
                                <div class="login-form">
                                    <form action="{{ route('auth.reset')}}" method="POST">
                                        @csrf
                                        <div class="form-group has-success">
                                            <label for="password" class="control-label mb-1">Digite Nova Senha</label>
                                            <input id="password" name="password" type="password" class="form-control"
                                                data-val="true" data-val-required="Digite a senha corretamente."
                                                autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation" class="control-label mb-1">Confirme Nova
                                                Senha</label>
                                            <input id="password_confirmation" name="password_confirmation"
                                                type="password" class="form-control" data-val="true"
                                                data-val-required="Confirme a senha corretamente." required>
                                        </div>
                                        <div class="form-group">
                                            <button id="payment-button" type="submit"
                                                class="au-btn au-btn--block au-btn--green m-b-20">Redefinir Senha
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
</div>
@endsection