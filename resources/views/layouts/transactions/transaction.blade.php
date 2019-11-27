@extends('admin.home')

@section('title', '- '.$tipoTransacao)

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <!-- Modal com formulário para cadastro de nova entidade -->
    @include('layouts.modals.modalTransaction', [
    'id' => 'ModalCadastrarTransacao',
    'title' => 'Cadastrar '.$tipoTransacao,
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.transaction.store', $typeTransaction)
    ])
    <!-- Fim do modal -->

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" id="status" name="property">
                                    <option value="TODAS" selected="selected">Todas</option>
                                    <option value="VENCIDA">Vencidas</option>
                                    <option value="A VENCER">A vencer</option>
                                    <option value="PAGA">Pagas</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--md">
                                <input class="form-control datepicker" type="text" id="min" name="min" datepicker placeholder="Data inicial" autocomplete="off" />
                            </div>
                            <div class="rs-select2--light rs-select2--md">
                                <input class="form-control datepicker" type="text" id="max" name="max" datepicker placeholder="Data Final" autocomplete="off" />
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#ModalCadastrarTransacao">
                                <i class="zmdi zmdi-plus"></i>Incluir&nbsp;{{$tipoTransacao}}</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="transactions" class="table table-data2" style="width:100%">
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
                                <th class="hidden">Situação</th>
                                <th><input type="search" id="search" class="form-control" placeholder="Procurar"></th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr class="tr-shadow">
                                    <td>{{$transaction->id}}</td>
                                    <td>{{empty($transaction->entity) ? ' ': strtoupper($transaction->entity['name']) }}</td>
                                    <!-- Nome do fornecedor ou cliente -->
                                    <td>{{ strtoupper($transaction->description) }}</td>
                                    <td>{{$transaction->due_date->format('d/m/Y')}}</td>
                                    <td>{{'R$ '.number_format($transaction->current_value,2, ',', '.')}}
                                    </td>
                                    <td class="hidden">
                                        @if($transaction->situation == '1') A VENCER
                                        @elseif ($transaction->situation == '2') PAGA
                                        @else VENCIDA
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <input type="hidden" name="id" value="{{$transaction->id}}">
                                            @if($transaction->situation != '2')
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Liquidar">
                                                <button class="item" type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalLiquidarTransacao{{$transaction->id}}">
                                                    <i class=" zmdi zmdi-check"></i>
                                                </button>
                                            </span>
                                            @endif
                                            <span data-toggle="tooltip" data-placement="top" title="Visualizar">
                                                <button class="item" id="btnVisualizar" type="button" class="btn btn-secundary btn-sm" data-toggle="modal" data-target="#ModalVisualizarTransacao{{$transaction->id}}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="top" title="Alterar">
                                                <button class="item" data-toggle="modal" data-target="#ModalAlterarTransacao{{$transaction->id}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="top" title="Excluir">
                                                <button class="item" data-toggle="modal" data-target="#ModalDeletar{{$transaction->id}}">
                                                    <i class=" zmdi zmdi-delete"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Modal com formulário para alteração dos dados da transação selecionada -->
                                    @include('layouts.modals.modalLiquidateTransaction', [
                                    'id' => 'ModalLiquidarTransacao'.$transaction->id,
                                    'title' => 'Liquidar '.$tipoTransacao,
                                    'btn' => 'Liquidar',
                                    'method' => 'post',
                                    'action' => route('admin.transaction.liquidate')
                                    ])
                                    <!-- Fim do modal -->

                                    <!-- Modal com formulário para visualização dos dados da transação selecionada -->
                                    @include('layouts.modals.modalViewTransaction', [
                                    'id' => 'ModalVisualizarTransacao'.$transaction->id,
                                    'title' => 'Visualizar '.$tipoTransacao                                    
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
                                    'message' => 'Confirma a exclusão da '.strtolower($tipoTransacao).' de Nº
                                    '.$transaction->id.' da aplicação?',
                                    'action' => route('admin.transaction.destroy'),
                                    'variable' => $transaction
                                    ])
                                    <!-- Fim do modal -->
                                </tr>
                                <!-- <tr class="spacer"></tr> -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $.fn.dataTableExt.afnFiltering.push(
        function(settings, data, dataIndex) {
            var min = $('#min').val();
            var max = $('#max').val();

            let mindate = new Date();
            mindate.setFullYear(min.split('/')[2]);
            mindate.setMonth(min.split('/')[1] - 1);
            mindate.setDate(min.split('/')[0]);

            let maxdate = new Date();
            maxdate.setFullYear(max.split('/')[2]);
            maxdate.setMonth(max.split('/')[1] - 1);
            maxdate.setDate(max.split('/')[0]);

            let coldate = new Date();
            coldate.setFullYear(data[3].split('/')[2]);
            coldate.setMonth(data[3].split('/')[1] - 1);
            coldate.setDate(data[3].split('/')[0]);

            if ((isNaN(mindate) && isNaN(maxdate)) ||
                (isNaN(mindate) && coldate <= maxdate) ||
                (mindate <= coldate && isNaN(maxdate)) ||
                (mindate <= coldate && coldate <= maxdate)) {
                return true;
            }
            if (document.getElementById('transactions') == settings.nTable) {
                return false;
            } else {
                return true;
            }
        },
        function(settings, data, dataIndex) {
            var status = $('#status').val();

            if (status == data[5] || status == 'TODAS') {
                return true;
            }
            if (document.getElementById('transactions') == settings.nTable) {
                return false;
            } else {
                return true;
            }
        }
    );

    $(function() {
        $("[datepicker]").datepicker();
        // $('.selectpicker.company').selectpicker();
        // $('.selectpicker.entity').selectpicker();

        var table = $('#transactions').DataTable({
            "language": {
                "paginate": {
                    "first": '<button class="btn"><i class="fas fa-step-backward"></i></button>',
                    "last": '<button class="btn"><i class="fas fa-step-forward"></i></button>',
                    "next": '<button class="btn"><i class="fas fa-chevron-circle-right"></i></button>',
                    "previous": '<button class="btn"><i class="fas fa-chevron-circle-left"></i></button>'
                }
            }
        });
        $('#search').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('#min, #max').change(function() {
            table.draw();
        });
        $('#status').change(function() {
            table.draw();
        });
        $('.mask-money').mask('#.##0,00', {reverse: true});
    });    
</script>
@endsection