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

                    @if (!empty($transaction))
                    <input type="hidden" name="id" value="{{$transaction->id}}">
                    @endif

                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="1">{{ empty($transaction) ?'':$transaction->description }}</textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="company">Empresa</label>
                            <select name="company" id="company" class="form-control">
                                @foreach($companies as $company)
                                <option value="{{$company->id}}" {{ empty($transaction) ?"": ($transaction->company_id == $company->id ? 'selected' : '') }}>
                                    {{$company->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="entity">
                                @if($tipoTransacao == 'Despesa') Fornecedor
                                @else Cliente
                                @endif
                            </label>
                            <select name="entity" id="entity" class="form-control">
                                @foreach($entities as $entity)
                                <option value="{{$entity->id}}" {{ empty($transaction) ?"": ($transaction->entity_id == $entity->id ? 'selected' : '') }}>{{$entity->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="form_of_payment">Forma de Pagamento</label>
                            <select name="form_of_payment" id="form_of_payment" class="form-control">
                                @foreach ($payments as $p)
                                <option value="{{$p->id}}">{{$p->description}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="due_date">Vencimento</label>
                            <input class="form-control" type="date" id="due_date" name="due_date" value="{{ empty($transaction) ?'':$transaction->due_date }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-2">
                            <label for="installments">Parcelas</label>
                            <input class="form-control" type="text" id="installments" name="installments" maxlength="3" value="{{ empty($transaction) ?'':$transaction->installments }}" />
                        </div>

                        <div class="col-4">
                            <label for="rates">Valor em Taxas</label>
                            <input class="form-control" type="text" id="rates" name="rates" value="{{ empty($transaction) ?'':$transaction->rates }}" />
                        </div>

                        <div class="col-4">
                            <label for="original_value">Valor Total</label>
                            <input class="form-control" type="text" id="original_value" name="original_value" value="{{ empty($transaction) ?'':$transaction->original_value }}" />
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