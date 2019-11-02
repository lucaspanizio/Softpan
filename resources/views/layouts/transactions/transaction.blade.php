@extends('admin.home')

@section('content')
<div class="container">

    <!-- Botão para incluir nova transação (aciona modal) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCadastrarTransacao"><i class="fas fa-plus"></i> Nova {{$tipoTransacao}}</button><br><br>

    <!-- Modal com formulário para cadastro de nova entidade -->
    @include('layouts.modals.modalTransaction', [
    'id' => 'ModalCadastrarTransacao',
    'title' => 'Cadastrar '.$tipoTransacao,
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.transaction.store', $typeTransaction)
    ])
    <!-- Fim do modal -->

    <div class="row">
        <!-- Campo de data para filtro dos títulos -->
        <div class="form-group px-3">
            <label for="initial_date">Data Inicial: </label>
            <div class='input-group date' id='datetimepicker6'>
                <input type='date' id="initial_date" name="initial_date" class="form-control" />                
            </div>
        </div>

        <div class="form-group px-3">
            <label for="final_date">Data Final: </label>
            <div class='input-group date' id='datetimepicker7'>
                <input type='date' id="final_date" name="final_date" class="form-control" />
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
    </div>

    <!-- Tabela de Despesas com breves informações de cada qual -->
    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
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
            <th width="130"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">

                <td>{{$transaction->id}}</td>
                <td>{{empty($transaction->entity) ? ' ': $transaction->entity->name}}</td> <!-- Nome do fornecedor ou cliente -->
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->due_date->format('d/m/Y')}}</td>
                <td>{{$transaction->current_value != null ? $transaction->current_value : $transaction->original_value}}</td>
                <td>
                    @if($transaction->situation == '1') A VENCER
                    @elseif ($transaction->situation == '2') PAGO
                    @else ATRASADO
                    @endif
                </td>


                <!-- Botão de alterar receita (aciona modal) -->
                <td class="text-right">
                    @if($transaction->current_value == null)
                    <button id="btnReceber" type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalLiquidarTransacao{{$transaction->id}}"><i class="fas fa-check"></i></button>
                    @endif
                    <button id="btnVisualizar" type="button" class="btn btn-secundary btn-sm" data-toggle="modal" data-target="#ModalVisualizarTransacao{{$transaction->id}}"><i class="fas fa-eye"></i></button>
                    <button id="btnAlterar" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalAlterarTransacao{{$transaction->id}}"><i class="fas fa-edit"></i></button>
                    <button id="btnEstornar" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalDeletar{{$transaction->id}}"><i class="far fa-trash-alt"></i></button>
                </td>

                <!-- Modal com formulário para visualização dos dados da transação selecionada -->
                @include('layouts.modals.modalViewTransaction', [
                'id' => 'ModalVisualizarTransacao'.$transaction->id,
                'title' => 'Visualizar Transação',
                'transaction' => $transaction
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados da transação selecionada -->
                @include('layouts.modals.modalLiquidateTransaction', [
                'id' => 'ModalLiquidarTransacao'.$transaction->id,
                'title' => 'Liquidar Transação',
                'btn' => 'Liquidar',
                'method' => 'post',
                'action' => route('admin.transaction.liquidate')
                ])               
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados da transação selecionada -->
                @include('layouts.modals.modalTransaction', [
                'id' => 'ModalAlterarTransacao'.$transaction->id,
                'title' => 'Alterar '.$tipoTransacao,
                'btn' => 'Salvar Alterações',
                'labelledby' => 'Alterar '.$tipoTransacao,
                'method' => 'patch',
                'action' => route('admin.transaction.update')
                ])
                <!-- Fim do modal -->

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.modals.modalDelete', [
                'id' => 'ModalDeletar'.$transaction->id,
                'title' => 'Excluir '.$tipoTransacao,
                'message' => 'Confirma a exclusão da '.strtolower($tipoTransacao).' de Nº '.$transaction->id.' da aplicação?',
                'action' => route('admin.transaction.destroy'),
                'variable' => $transaction
                ])
                <!-- Fim do modal -->
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection