<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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

                    @if (!empty($entity))
                    <input type="hidden" name="id" value="{{$entity->id}}">
                    @endif
                    <div class="row">
                        <div class="col">
                            <label for="name">Nome/ Razão</label>
                            <input name="name" type="text" class="form-control text-uppercase" value="{{ empty($entity) ?'':$entity->name }}" required>
                        </div>
                        <div class="col">
                            <label for="cnpj">CNPJ</label>
                            <input name="cnpj" id="cnpj" type="text" class="form-control mask-cnpj" value="{{ empty($entity) ?'':$entity->cnpj }}">
                        </div>
                        <div class="col">
                            <label for="cpf">CPF</label>
                            <input name="cpf" id="cpf" type="text" class="form-control mask-cpf" value="{{ empty($entity) ?'':$entity->cpf }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <label for="neighborhood">Bairro</label>
                            <input name="neighborhood" type="text" class="form-control text-uppercase" value="{{ empty($entity) ?'':$entity->neighborhood }}">
                        </div>
                        <div class="col-5">
                            <label for="street">Rua</label>
                            <input name="street" type="text" class="form-control text-uppercase" value="{{ empty($entity) ?'':$entity->street }}">
                        </div>
                        <div class="col-2">
                            <label for="number">Número</label>
                            <input name="number" type="text" maxlength="6" class="form-control" value="{{ empty($entity) ?'':$entity->number }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="zipcode">CEP</label>
                            <input name="zipcode" class="form-control mask-zipcode" value="{{ empty($entity) ? '' : $entity->zipcode }}">
                        </div>
                        <div class="col-6">
                            <label for="city">Cidade</label>
                            <input name="city" type="text" class="form-control text-uppercase" value="{{ empty($entity) ?'':$entity->city }}">
                        </div>
                        <div class="col-2">
                            <label for="state">Estado</label>
                            <input name="state" type="text" class="form-control mask-state" value="{{ empty($entity) ?'':$entity->state }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" class="form-control mask-email" value="{{ empty($entity) ?'':$entity->email }}" required>
                        </div>
                        <div class="col">
                            <label for="phone1">Telefone 1</label>
                            <input name="phone1" type="text" class="form-control mask-phone" value="{{ empty($entity) ?'':$entity->phone1 }}" required>
                        </div>
                        <div class="col">
                            <label for="phone2">Telefone 2</label>
                            <input name="phone2" type="text" class="form-control mask-phone" value="{{ empty($entity) ?'':$entity->phone2 }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="cellphone">Celular</label>
                            <input name="cellphone" type="text" class="form-control mask-cellphone" value="{{ empty($entity) ?'':$entity->cellphone }}">
                        </div>

                        <div class="col-4">
                            <label for="situation">Situação</label>
                            <select name="situation" class="form-control">
                                <option value="1" {{ empty($entity) ? 'selected' : (($entity->situation == "ATIVO")?'selected':'') }}>ATIVO</option>
                                <option value="0" {{ empty($entity) ? '' : (($entity->situation == "INATIVO")?'selected':'') }}>INATIVO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="actions modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>
</div>