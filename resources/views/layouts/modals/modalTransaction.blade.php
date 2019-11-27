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
                            <select class="form-control" name="company">
                                @foreach($companies as $c)
                                <option value="{{$c->id}}" {{ empty($transaction) ? '' : ($transaction->company_id == $c->id ? 'selected' : '') }}>
                                    {{$c->name}}
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
                            <select name="entity" class="form-control">
                                @foreach($entities as $e)
                                @if ($e->situation == 1)
                                <option value="{{$e->id}}" {{ empty($transaction) ? '' : ($transaction->entity_id == $e->id ? 'selected' : '') }}>{{$e  ->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="form_of_payment">Forma de Pagamento</label>
                            <select name="form_of_payment" class="form-control">
                                @foreach ($payments as $p)
                                <option value="{{$p->id}}" {{ empty($transaction) ? '' : ($transaction->payment_id == $p->id ? 'selected' : '') }}>{{$p->description}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="due_date">Vencimento</label>
                            <div class="form-group">                                
                                <input class="form-control" type="text" datepicker name="due_date" value="{{ empty($transaction) ? '' : $transaction->due_date->format('d/m/Y') }}" placeholder="Vencimento" required autocomplete="off" />
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
                            <input class="form-control mask-money" type="text" id="rates" name="rates" value="{{ empty($transaction) ?'':$transaction->rates }}" placeholder="R$">
                        </div>

                        <div class="col-4">
                            <label for="original_value">Valor</label>
                            <input class="form-control mask-money" type="text" name="original_value" value="{{ empty($transaction) ?'': 'R$ '.number_format($transaction->current_value,2, ',', '.') }}" placeholder="R$" required/>
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
