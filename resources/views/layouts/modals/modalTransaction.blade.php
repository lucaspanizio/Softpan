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
                            <select class="selectpicker" name="company" id="company" data-live-search="true" data-size="3">
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
                            <select name="entity" class="form-group selectpicker" data-live-search="true" data-size="3">
                                @foreach($entities as $entity)
                                @if ($entity->situation == true)
                                <option value="{{$entity->id}}" {{ empty($transaction) ?"": ($transaction->entity_id == $entity->id ? 'selected' : '') }}>{{$entity->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="form_of_payment">Forma de Pagamento</label>
                            <select name="form_of_payment" id="form_of_payment" class="form-control selectpicker" data-dropup-auto="false">
                                @foreach ($payments as $p)
                                <option value="{{$p->id}}">{{$p->description}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="due_date">Vencimento</label>
                            <div class="form-group">                                
                                <input class="form-control" type="text" datepicker name="due_date" value="{{ empty($transaction) ? '' : $transaction->due_date->format('d/m/Y') }}" placeholder="Vencimento" autocomplete="off" />
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for="installments">Parcelas</label>
                            <input class="form-control" type="number" id="installments" name="installments" maxlength="3" value="{{ empty($transaction) ?'1':$transaction->installments }}" required/>
                        </div>

                        <div class="col-4">
                            <label for="rates">Taxas</label>
                            <input class="form-control" type="text" id="rates" name="rates" value="{{ empty($transaction) ?'':$transaction->rates }}" placeholder="R$">
                        </div>

                        <div class="col-4">
                            <label for="original_value">Valor</label>
                            <input class="form-control" type="text" id="original_value" name="original_value" value="{{ empty($transaction) ?'':$transaction->original_value }}" placeholder="R$" />
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