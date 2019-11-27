<div id="{{$id}}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{$title}}
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
                    <div class="col-8">{{ strtoupper($transaction->company['name']) }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>{{ $transaction->entity['type'] == 'C' ? 'Cliente:' : 'Fornecedor:' }}</b></div>
                    <div class="col-8">{{ strtoupper($transaction->entity['name']) }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Usuário:</b></div>
                    <div class="col-8">{{ strtoupper($transaction->user['name']) }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Forma de Pagamento:</b></div>
                    <div class="col-8">{{$transaction->payment['description']}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Original:</b></div>
                    <div class="col-8">{{ 'R$ '.number_format($transaction->original_value,2, ',', '.') }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Juros:</b></div>
                    <div class="col-8">{{ $transaction->interest_rate != null ? 'R$ '.number_format($transaction->interest_rate,2, ',', '.') : ''}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Multa:</b></div>
                    <div class="col-8">{{$transaction->penalty != null ? 'R$ '.number_format($transaction->penalty,2, ',', '.') : ''}}</div>
                </div>
                <div class="row">
                    <div class="col-4"><b>Valor Total Pago:</b></div>
                    @if($transaction->pay_off_date != null)
                    <div class="col-8">{{ 'R$ '.number_format($transaction->current_value,2, ',', '.') }}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-4"><b>Situação:</b></div>
                    @if($transaction->situation == '1')
                    <div class="col-8">A VENCER</div>
                    @elseif($transaction->situation == '2')
                    <div class="col-8">PAGA</div>
                    @else
                    <div class="col-8">VENCIDA</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>