@extends('admin.home')

@section('title', '- '.$tipoEntidade)

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <!-- Modal com formulário para cadastro de nova entidade -->
    @include('layouts.modals.modalEntity', [
    'id' => 'ModalCadastrarEntidade',
    'labelledby' => 'Cadastrar '.$tipoEntidade,
    'title' => 'Cadastrar '.$tipoEntidade,
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.entity.store', $e)
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
                                    <option value="TODOS" selected="selected">Todos</option>
                                    <option value="ATIVO">Ativos</option>
                                    <option value="INATIVO">Inativos</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#ModalCadastrarEntidade">
                                <i class="zmdi zmdi-plus"></i>incluir {{$tipoEntidade}}</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="entities" class="table table-data2" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{$tipoEntidade}}</th>
                                    <th>Documento</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th class="hidden">Situação</th>
                                    <th><input type="search" id="search" class="form-control" placeholder="Procurar"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entities as $entity)
                                <tr class="tr-shadow">
                                    <td>{{$entity->id}}</td>
                                    <td>{{ strtoupper($entity->name) }}</td>
                                    @if (!empty($entity->cnpj))
                                    <td>{{$entity->cnpj}}</td>
                                    @else
                                    <td>{{$entity->cpf}}</td>
                                    @endif
                                    <td>{{ strtoupper($entity->city) }}</td>
                                    <td>{{ strtoupper($entity->state) }}</td>
                                    <td class="hidden">
                                        @if($entity->situation == 1) ATIVO
                                        @else INATIVO
                                        @endif
                                    </td>

                                    <td>
                                        <div class="table-data-feature">
                                            <span data-toggle="tooltip" data-placement="top" title="Alterar">
                                                <button class="item" data-toggle="modal" data-target="#ModalAlterarEntidade{{$entity->id}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </span>
                                            <input type="hidden" name="id" value="{{$entity->id}}">
                                            <span data-toggle="tooltip" data-placement="top" title="Excluir">
                                                <button class="item" data-toggle="modal" data-target="#ModalDeletar{{$entity->id}}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                    <!-- Modal para confirmação da exclusão  -->
                                    @include('layouts.modals.modalDelete', [
                                    'id' => 'ModalDeletar'.$entity->id,
                                    'title' => 'Excluir '.$tipoEntidade,
                                    'message' => 'Confirma a exclusão do '.strtolower($tipoEntidade).' '.$entity->name.' da aplicação?',
                                    'action' => route('admin.entity.destroy'),
                                    'variable' => $entity
                                    ])
                                    <!-- Fim do modal -->

                                    <!-- Modal com formulário para alteração dos dados do fornecedor selecionado -->
                                    @include('layouts.modals.modalEntity', [
                                    'id' => 'ModalAlterarEntidade'.$entity->id,
                                    'title' => 'Alterar '.$tipoEntidade,
                                    'btn' => 'Salvar Alterações',
                                    'labelledby' => 'Alterar '.$tipoEntidade,
                                    'method' => 'patch',
                                    'action' => route('admin.entity.update')
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

            if (status == data[5] || status == 'TODOS') {
                return true;
            }
            if (document.getElementById('entities') == settings.nTable) {
                return false;
            } else {
                return true;
            }
        }
    );

    $(function() {
        var table = $('#entities').DataTable({
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
        $('.mask-cpf').mask('000-000.000-00');
        $('.mask-cnpj').mask('00.000.000/0000-00');
        $('.mask-state').mask('SS');
        $('.mask-phone').mask('(00) 0000-0000');
        $('.mask-cellphone').mask('(00) 0 0000-0000');
        $('.mask-zipcode').mask('00000-000');
        /* Fim Mascaras */

        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 6000);

        /* Controle sobre CNPJ ou CPF
         * Nunca permitira o preenchimento dos dois campos no formulário
         */
        var cpf = document.getElementById("cpf");
        var cnpj = document.getElementById("cnpj");

        cpf.addEventListener('keyup', function() {
            cnpj.disabled = cpf.value.trim().length > 0;
        });
        
        cnpj.addEventListener('keyup', function() {
            cpf.disabled = cnpj.value.trim().length > 0;
        });
    });
</script>
@endsection