@extends('admin.home')

@section('title', '- Empresa')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <!-- Modal com formulário para cadastro de nova empresa -->
    @include('layouts.modals.modalCompany', [
    'id' => 'ModalCadastrarEmpresa',
    'title' => 'Cadastrar Empresa',
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.company.store')
    ])
    <!-- Fim do modal -->

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    @if(session('msg-error'))
                    <div class="alert alert-danger">
                        <p>{{session('msg-error')}}</p>
                    </div>
                    @endif
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" id="status" name="property">
                                    <option value="TODAS" selected="selected">Todas</option>
                                    <option value="ATIVA">Ativas</option>
                                    <option value="INATIVA">Inativas</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#ModalCadastrarEmpresa">
                                <i class="zmdi zmdi-plus"></i>incluir empresa</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="companies" class="table table-data2" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>CNPJ</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th class="hidden">Situação</th>
                                    <th><input type="search" id="search" class="form-control" placeholder="Procurar"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr class="tr-shadow">
                                    <td>{{$company->id}}</td>
                                    <td>{{ strtoupper($company->name) }}</td>
                                    <td>{{$company->cnpj}}</td>
                                    <td>{{ strtoupper($company->city) }}</td>
                                    <td>{{ strtoupper($company->state) }}</td>
                                    <td class="hidden">
                                        @if($company->situation == 1) ATIVA
                                        @else INATIVA
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <span data-toggle="tooltip" data-placement="top" title="Alterar">
                                                <button class="item" data-toggle="modal" data-target="#ModalAlterarEmpresa{{$company->id}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </span>
                                            <input type="hidden" name="id" value="{{$company->id}}">
                                            <span data-toggle="tooltip" data-placement="top" title="Excluir">
                                                <button class="item" data-toggle="modal" data-target="#ModalDeletar{{$company->id}}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                    <!-- Modal para confirmação da exclusão  -->
                                    @include('layouts.modals.modalDelete', [
                                    'id' => 'ModalDeletar'.$company->id,
                                    'title' => 'Excluir Empresa',
                                    'message' => 'Confirma a exclusão da empresa '.$company->name.' da aplicação?',
                                    'action' => route('admin.company.destroy'),
                                    'variable' => $company
                                    ])
                                    <!-- Fim do modal -->

                                    <!-- Modal com formulário para alteração dos dados do usuário selecionado -->
                                    @include('layouts.modals.modalCompany', [
                                    'id' => 'ModalAlterarEmpresa'.$company->id,
                                    'title' => 'Alterar Empresa',
                                    'btn' => 'Salvar Alterações',
                                    'method' => 'patch',
                                    'action' => route('admin.company.update'),
                                    'company' => $company
                                    ])
                                    <!-- Fim do modal -->
                                </tr>
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
            var status = $('#status').val();

            if (status == data[5] || status == 'TODAS') {
                return true;
            }
            if (document.getElementById('companies') == settings.nTable) {
                return false;
            } else {
                return true;
            }
        }
    );

    $(function() {
        var table = $('#companies').DataTable({
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
        $('#status').change(function() {
            table.draw();
        });

        /* Inicio Mascaras */
        $('.mask-cnpj').mask('00.000.000/0000-00');
        $('.mask-state').mask('SS');
        $('.mask-phone').mask('(00) 0000-0000');
        $('.mask-cellphone').mask('(00) 0 0000-0000');
        $('.mask-zipcode').mask('00000-000');
        /* Fim Mascaras */
    });
</script>
@endsection