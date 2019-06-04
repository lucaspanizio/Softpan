<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
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

                    @if (!empty($empresa))
                    <input type="hidden" name="id" value="{{$empresa->id}}">
                    @endif
                    <div class="row">
                        <div class="col">
                            <label for="name">Nome/ Razão</label>
                            <input name="name" type="text" class="form-control" value="{{ empty($empresa) ?'':$empresa->name }}" id="name">
                        </div>
                        <div class="col">
                            <label for="cnpj">CNPJ</label>
                            <input name="cnpj" type="text" class="form-control" value="{{ empty($empresa) ?'':$empresa->cnpj }}" id="cnpj">
                        </div>
                    </div>                    

                    <div class="row">
                        <div class="col">
                            <label for="street">Rua</label>
                            <input name="street" type="text" class="form-control" value="{{ empty($empresa) ?'':$empresa->street }}" id="street">
                        </div>
                        <div class="col">
                            <label for="number">Número</label>
                            <input name="number" type="number" min="0" class="form-control" value="{{ empty($empresa) ?'':$empresa->number }}" id="number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="city">Cidade</label>
                            <input name="city" type="text" class="form-control" value="{{ empty($empresa) ?'':$empresa->city }}" id="city">
                        </div>
                        <div class="col">
                            <label for="state">Estado</label>
                            <input name="state" type="text" class="form-control" value="{{ empty($empresa) ?'':$empresa->state }}" id="state">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="phone">Telefone</label>
                            <input name="phone" type="text" class="form-control" value="{{ empty($empresa) ?'':$empresa->phone }}" id="phone">
                        </div>

                        <div class="col">
                            <label for="situation">Situação</label>
                            <select name="situation" id="situation" class="form-control">
                                <option value="1" {{ empty($empresa) ? 'selected' : (($empresa->situation == "ATIVA")?'selected':'') }}>ATIVA</option>
                                <option value="0" {{ empty($empresa) ? 'selected' : (($empresa->situation == "INATIVA")?'selected':'') }}>INATIVA</option>
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