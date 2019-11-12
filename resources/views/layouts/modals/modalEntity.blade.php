<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{$action}}">
                @method($method)
                @csrf
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="TituloModalCentralizado">{{$title}}</h5> --}}
                    {{$title}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if (!empty($entity))
                    <input type="hidden" name="id" value="{{$entity->id}}">
                    @endif
                    <div class="row">
                        <div class="col">
                            <label for="name">Nome/ Razão</label>
                            <input name="name" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->name }}" id="name">
                        </div>
                        <div class="col">
                            <label for="cnpj">CNPJ</label>
                            <input name="cnpj" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->cnpj }}" id="cnpj">
                        </div>
                        <div class="col">
                            <label for="cpf">CPF</label>
                            <input name="cpf" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->cpf }}" id="cpf">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <label for="neighborhood">Bairro</label>
                            <input name="neighborhood" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->neighborhood }}" id="neighborhood" required>
                        </div>
                        <div class="col-5">
                            <label for="street">Rua</label>
                            <input name="street" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->street }}" id="street">
                        </div>
                        <div class="col-2">
                            <label for="number">Número</label>
                            <input name="number" type="number" min="0" class="form-control" value="{{ empty($entity) ?'':$entity->number }}" id="number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="zipcode">CEP</label>
                            <input onblur="pesquisacep(this.value);" name="zipcode" class="form-control" value="{{ empty($entity) ? '' : $entity->zipcode }}" id="zipcode">
                        </div>
                        <div class="col-6">
                            <label for="city">Cidade</label>
                            <input name="city" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->city }}" id="city">
                        </div>
                        <div class="col-2">
                            <label for="state">Estado</label>
                            <input name="state" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->state }}" id="state">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" value="{{ empty($entity) ?'':$entity->email }}">
                        </div>
                        <div class="col">
                            <label for="phone1">Telefone 1</label>
                            <input name="phone1" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->phone1 }}" id="phone1">
                        </div>
                        <div class="col">
                            <label for="phone2">Telefone 2</label>
                            <input name="phone2" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->phone2 }}" id="phone2">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="cellphone">Celular</label>
                            <input name="cellphone" type="text" class="form-control" value="{{ empty($entity) ?'':$entity->cellphone }}" id="cellphone">
                        </div>

                        <div class="col-4">
                            <label for="situation">Situação</label>
                            <select name="situation" id="situation" class="form-control">
                                <option value="1" {{ empty($entity) ? 'selected' : (($entity->situation == "INATIVO")?'selected':'') }}>INATIVO</option>
                                <option value="0" {{ empty($entity) ? 'selected' : (($entity->situation == "ATIVO")?'selected':'') }}>ATIVO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="actions modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>
</div>