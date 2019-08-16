@extends('admin.home')

@section('content')
<div class="container">

    <div class="row">

        <!-- Campo de data para filtro dos títulos -->
        <div class="col-3">
            <label>Vencimentos até: </label>
            <div class=" input-group" style="width: 13.1em">
                <input class="form-control" type="date" id="inputDate1">
                <div class="input-group-append" for="inputDate1">
                    <label class="input-group-text" for="inputDate1"><i class="far fa-calendar-alt"></i></label>
                </div>
            </div>
        </div>

        <!-- Check box's de filtro para demonstração dos títulos -->
        <div class="col-5">
            <label>Situação: </label><br>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline1">A vencer</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline2">Recebidos</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="defaultInline3" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline3">Atrasados</label>
            </div>
        </div>
        <!-- Botões para incluir, alterar e estornar as receitas (acionam modais) -->
        <div class="col-4 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCadastrarCliente"><i class="fas fa-plus"></i> Incluir&nbsp;&nbsp;&nbsp;</button>
            <button id="btnReceber" type="submit" class="btn btn-success" data-toggle="modal" data-target="#ModalReceber"><i class="fas fa-check"></i> Receber</button>
            <button id="btnEstornar" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeletar"><i class="far fa-trash-alt"></i> Estornar</button>
        </div>

    </div><br>

    <!-- Modal para confirmação da exclusão  -->
    @include('layouts.modalDelete', [
    'id' => 'ModalDeletar',
    'title' => 'Estornar Receita',
    'message' => 'Confirma o estorno de selectionRow() receita(s)?',
    'action' => route('admin.user.destroy')
    ])
    <!-- Fim do modal -->
    <!-- Tabela de Receitas com breves informações de cada qual -->
    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Vencimento</th>
                <th>Valor</th>
                <th>Situação</th>
                <th width="30"></th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach () -->
            <tr>
                <td>1</td>
                <td>SR. GETULIO</td>
                <td>ALUGUEL DO IMOVEL</td>
                <td>21/07/2019</td>
                <td>9000</td>
                <td>PAGO</td>

                <!-- Botão de alterar receita (aciona modal) -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarCliente"><i class="fas fa-edit"></i> Alterar</button>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <!-- Campos de valor original, juros, multa e valor atual para o título selecionado -->
    <div class="row">

        <div class="col-3">
            <label for="inputValorOriginal">Valor Original: </label>
            <input class="form-control" type="text" id="inputValorOriginal">
        </div>

        <div class="col-3">
            <label for="inputJuros">Juros: </label>
            <input class="form-control" type="text" id="inputJuros">
        </div>

        <div class="col-3">
            <label for="inputMulta">Multa: </label>
            <input class="form-control" type="text" id="inputMulta">
        </div>

        <div class="col-3">
            <label for="inputValorAtual">Valor Atual: </label>
            <input class="form-control" type="text" id="inputValorAtual">
        </div>
    </div>
</div>
@endsection