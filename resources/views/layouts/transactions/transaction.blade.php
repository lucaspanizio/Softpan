@extends('admin.home')

@section('content')
<div class="container">

    <!-- Botão para incluir nova transação (aciona modal) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCadastrarTransacao"><i class="fas fa-plus"></i> Nova {{$tipoTransacao}}</button><br><br>

    <!-- Modal com formulário para cadastro de nova entidade -->
    @include('layouts.transactions.modals.modalTransaction', [
    'id' => 'ModalCadastrarTransacao',
    'labelledby' => 'Cadastrar '.$tipoTransacao,
    'title' => 'Cadastrar '.$tipoTransacao,
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.transaction.store', $typeTransaction)
    ])
    <!-- Fim do modal -->

    <div class="row">

        <!-- Campo de data para filtro dos títulos -->  
        <div class="col-3">
            <label>Vencimentos até: </label>
            <div class=" input-group">
                <input class="form-control" type="date" id="inputDate1">
            </div>
        </div>

        <!-- Check box's de filtro para demonstração dos títulos -->
        <div class="col">
            <label>Situação: </label><br>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample" checked>
                <label class="custom-control-label" for="defaultInline1">Todos</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline2">A vencer</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline3" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline3">Pagos</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline4" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline4">Atrasados</label>
            </div>
        </div>
    </div><br>

    <!-- Tabela de Despesas com breves informações de cada qual -->
    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th>#</th>
                @if ($typeTransaction == "receivable")
                <th>Cliente</th>
                @else
                <th>Fornecedor</th>
                @endif

                <th>Descrição</th>
                <th>Vencimento</th>
                <th>Valor</th>
                <th>Situação</th>
                <th width="120"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($transactions as $transaction)
                <td>{{$transaction->id}}</td>
                <td>COMO COLOCAR AQUI?</td> <!-- Nome do fornecedor ou cliente -->
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->due_date}}</td>
                <td>{{$transaction->original_value}}</td>
                <td>
                    @if($transaction->situation == '1')
                    A VENCER
                    @elseif ($transaction->situation == '2')
                    PAGO
                    @else
                    ATRASADO
                    @endif
                </td>
                @endforeach

                <!-- Botão de alterar receita (aciona modal) -->
                <td>
                    <button id="btnReceber" type="submit" class="btn btn-success" data-toggle="modal" data-target="#ModalReceber"><i class="fas fa-check"></i></button>
                    <button id="btnAlterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarTransacao"><i class="fas fa-edit"></i></button>
                    <button id="btnEstornar" class="btn btn-danger" data-toggle="modal" data-target="#ModalEstornar"><i class="far fa-trash-alt"></i></button>
                </td>

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.modalDelete', [
                'id' => 'ModalEstornar'.$transaction->id,
                'title' => 'Estornar '.$tipoTransacao,
                'message' => 'Confirma a exclusão desta '.strtolower($tipoTransacao).' da aplicação?',
                'action' => route('admin.transaction.destroy'),
                'variable' => $transaction
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados da transação selecionado -->
                @include('layouts.transactions.modals.modalTransaction', [
                'id' => 'ModalAlterarTransacao'.$transaction->id,
                'title' => 'Alterar '.$tipoTransacao,
                'btn' => 'Salvar Alterações',
                'labelledby' => 'Alterar '.$tipoTransacao,
                'method' => 'patch',
                'action' => route('admin.transaction.update')
                ])
                <!-- Fim do modal -->

            </tr>
        </tbody>
    </table>

    <br>
    <!-- Campos de valor original, juros, multa e valor atual para o título selecionado -->
    <div class="row">

        <div class="col-3">
            <label for="inputJuros">Juros: </label>
            <input class="form-control" type="text" id="inputJuros" placeholder="R$ 0.00" disabled>
        </div>

        <div class="col-3">
            <label for="inputMulta">Multa: </label>
            <input class="form-control" type="text" id="inputMulta" placeholder="R$ 0.00" disabled>
        </div>

        <div class="col-3">
            <label for="inputValorFinal">Valor Final: </label>
            <input class="form-control" type="text" id="inputValorFinal" placeholder="TRANSACAO SELECIONADA (COMO?)" disabled>
        </div>

        <div class="col-3">
            <label for="inputDataRecebimento">Recebimento: </label>
            <input class="form-control" type="text" id="inputDataRecebimento" placeholder="TRANSACAO SELECIONADA (COMO?)" disabled>
        </div>
    </div>
</div>
@endsection