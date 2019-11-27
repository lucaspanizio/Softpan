@extends('admin.home')

@section('title','- Relatório 2')
<!-- Despesas x Fornecedores -->

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-5 mb-5">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    Relação de Fornecedores x Despesas
                                    <small class="float-right">Emissão: {{ \Carbon\Carbon::now('America/Sao_Paulo')->format('d/m/Y') }}</small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Período do Relatório:
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Fornecedor</th>
                                            <th>Vencimento</th>
                                            <th>Data Pagamento</th>
                                            <th>Valor Original</th>
                                            <th>Valor Pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->id}}</td>
                                            <td>{{strtoupper($transaction->entity['name'])}}</td>
                                            <td>{{$transaction->due_date->format('d/m/Y')}}</td>
                                            <td>{{$transaction->pay_off_date != null ? $transaction->pay_off_date->format('d/m/Y') : ''}}</td>
                                            <td>{{ 'R$ '.number_format($transaction->original_value,2, ',', '.') }}</td>
                                            <td>{{'R$ '.number_format($transaction->current_value,2, ',', '.')}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>  <td></td>  <td></td>  <td></td>  <td></td>                                            
                                            <th><h5>Valor Total</h5></th>                                            
                                        </tr>
                                        <tr>
                                            <td></td>  <td></td>  <td></td>  <td></td>  <td></td>                                            
                                            <td><h5>{{'R$ '.number_format($total,2, ',', '.')}}</h5></td>                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary float-right" onClick="window.print()" style="margin-right: 5px;">
                                    <i class="fas fa-print"></i> Imprimir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    @endsection