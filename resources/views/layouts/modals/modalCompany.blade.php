<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{$action}}">
                @method($method)
                @csrf
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="TituloModalCentralizado">{{$title}}</h5> -->
                    {{$title}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if (!empty($company))
                    <input type="hidden" name="id" value="{{$company->id}}">
                    @endif
                    <div class="row">
                        <div class="col">
                            <label for="name">Nome/ Razão</label>
                            <input name="name" type="text" class="form-control text-uppercase" value="{{ empty($company) ?'':$company->name }}" id="name" required>
                        </div>
                        <div class="col">
                            <label for="cnpj">CNPJ</label>
                            <input name="cnpj" type="text" class="form-control mask-cnpj" value="{{ empty($company) ?'':$company->cnpj }}" id="cnpj" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9">
                            <label for="street">Rua</label>
                            <input name="street" type="text" class="form-control text-uppercase" value="{{ empty($company) ?'':$company->street }}">
                        </div>
                        <div class="col-3">
                            <label for="number">Número</label>
                            <input name="number" type="text" maxlength="6" class="form-control" value="{{ empty($company) ?'':$company->number }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <label for="neighborhood">Bairro</label>
                            <input name="neighborhood" type="text" class="form-control text-uppercase" value="{{ empty($company) ?'':$company->neighborhood }}">
                        </div>
                        <div class="col-4">
                            <label for="zipcode">CEP</label>
                            <input name="zipcode" type="text" class="form-control mask-zipcode" value="{{ empty($company) ?'':$company->zipcode }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <label for="city">Cidade</label>
                            <input name="city" type="text" class="form-control text-uppercase" value="{{ empty($company) ?'':$company->city }}">
                        </div>
                        <div class="col-2">
                            <label for="state">Estado</label>
                            <input name="state" type="text" class="form-control mask-state" value="{{ empty($company) ?'':$company->state }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="phone1">Telefone</label>
                            <input name="phone1" type="text" class="form-control mask-phone" value="{{ empty($company) ?'':$company->phone1 }}" id="phone1">
                        </div>

                        <div class="col">
                            <label for="situation">Situação</label>
                            <select name="situation" class="form-control">
                                <option value="1" {{ empty($company) ? 'selected' : (($company->situation == "ATIVA")?'selected':'') }}>ATIVA</option>
                                <option value="0" {{ empty($company) ? '' : (($company->situation == "INATIVA")?'selected':'') }}>INATIVA</option>
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