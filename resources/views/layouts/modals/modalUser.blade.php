<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{$action}}">
                @method($method)
                @csrf
                <div class="modal-header">
                    {{$title}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if (!empty($user))
                    <input type="hidden" name="id" value="{{$user->id}}">
                    @endif
                    <div class="form-group row">
                        <div class="col">
                            <label for="name">Nome Completo</label>
                            <input name="name" type="text" class="form-control text-uppercase" name="name" value="{{ empty($user) ?'':$user->name }}" required>
                        </div>

                        <div class="col">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" class="form-control" name="name" value="{{ empty($user) ?'':$user->email }}" required>

                            <!-- {{ $errors->has('email') ? ' is-invalid' : '' }} -->
                            <!-- @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="password">{{$lbl_pass1}}</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>
                    
                        <div class="col">
                            <label for="password-confirm">{{$lbl_pass2}}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="situation">Situação</label>
                            <select name="situation" id="situation" class="form-control">
                                <option value="1" {{ empty($user) ? 'selected' : (($user->situation == "ATIVO")?'selected':'') }}>ATIVO</option>
                                <option value="0" {{ empty($user) ? '' : (($user->situation == "INATIVO")?'selected':'') }}>INATIVO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">       
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>
</div>