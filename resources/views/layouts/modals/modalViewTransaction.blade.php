<div id="{{$id}}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">{{$title}}</h5>
                <div class="close">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-4"><b>Data Inclusão:</b></div>
                    <div class="col-8">{{$transaction->created_at->format('d/m/Y')}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Data Vencimento:</b></div>
                    <div class="col-8">{{$transaction->due_date->format('d/m/Y')}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Data Liquidação:</b></div>
                    @if($transaction->pay_off_date != null)
                    <div class="col-8">{{$transaction->pay_off_date->format('d/m/Y')}}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-4"><b>Empresa:</b></div>
                    <div class="col-8">{{$transaction->company->name}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>{{ $transaction->entity->type == 'C' ? 'Cliente:' : 'Fornecedor:' }}</b></div>
                    <div class="col-8">{{$transaction->entity->name}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Usuário:</b></div>
                    <div class="col-8">{{$transaction->user->name}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Original:</b></div>
                    <div class="col-8">{{$transaction->original_value}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Juros:</b></div>
                    <div class="col-8">{{ $transaction->interest_rate != null ? $transaction->interest_rate : ''}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Multa:</b></div>
                    <div class="col-8">{{$transaction->penalty != null ? $transaction->penalty : ''}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Total Pago:</b></div>
                    @if($transaction->pay_off_date != null)
                    <div class="col-8">{{$transaction->current_value}}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-4"><b>Situação:</b></div>
                    @if($transaction->situation == '1')
                        <div class="col-8">A VENCER</div>
                    @elseif($transaction->situation == '2')
                        <div class="col-8">PAGO</div>
                    @else
                        <div class="col-8">ATRASADO</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>