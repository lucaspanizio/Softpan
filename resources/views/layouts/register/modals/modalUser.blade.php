<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="Alterar Usuário" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{$action}}">
                @method($method)
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                @if (!empty($usuario)) 
                   <input type="hidden" name="id" value="{{$usuario->id}}">
                @endif
                    <div class="row">
                        <div class="col">
                            <label for="name">Nome Completo</label>
                            <input name="name" type="text" class="form-control" value="{{ empty($usuario) ?'':$usuario->name }}" id="name" placeholder="">
                        </div>
                        <div class="col">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" value="{{ empty($usuario) ?'':$usuario->email }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="newpass">{{$lbl_pass1}}</label>
                            <input name="password" type="password" class="form-control" id="newpass" value="">
                        </div>
                        <div class="col">
                            <label for="newpass2">{{$lbl_pass2}}</label>
                            <input name="password_confirmation" type="password" class="form-control" id="newpass2" data-match="newpass">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="role">Perfil</label>
                            <select name="role" id="role" class="form-control">
                                <option value="COMUM" {{ empty($usuario) ? 'selected' : (($usuario->role == "COMUM")?'selected':'') }}>Comum</option>
                                <option value="ADMIN"  {{ empty($usuario) ? 'selected' : (($usuario->role == "ADMIN")?'selected':'') }}>Administrador</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="situation">Situação</label>
                            <select name="situation" id="situation" class="form-control">
                                <option value="1" selected>Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>
</div>