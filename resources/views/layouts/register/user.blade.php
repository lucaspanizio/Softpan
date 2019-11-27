@extends('admin.home')

@section('title', '- Usuário')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <!-- Modal com formulário para cadastro de novo usuário -->
    @include('layouts.modals.modalUser', [
    'id' => 'ModalCadastrarUsuario',
    'title' => 'Cadastrar Usuário',
    'btn' => 'Cadastrar',
    'lbl_pass1' => 'Senha',
    'lbl_pass2' => 'Confirme a Senha',
    'method' => 'put',
    'action' => route('admin.user.store')
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
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#ModalCadastrarUsuario">
                                <i class="zmdi zmdi-plus"></i>Incluir Usuário</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="users" class="table table-data2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th col="20px">Email</th>
                                    <th>Situação</th>
                                    <th><input type="search" id="search" class="form-control" placeholder="Procurar"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="tr-shadow">
                                    <td>{{$user->id}}</td>
                                    <td class="desc">{{ strtoupper($user->name) }}</td>
                                    <td><span class="block-email">{{ $user->email }}</span></td>
                                    @if ($user->situation == '1')
                                    <td><span class="status--process">Ativo</span></td>
                                    @else
                                    <td><span class="status--denied">Inativo</span></td>
                                    @endif
                                    <td>
                                        <div class="table-data-feature">
                                            <span data-toggle="tooltip" data-placement="top" title="Alterar">
                                                <button class="item" data-toggle="modal" data-target="#ModalAlterar{{$user->id}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </span>
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <span data-toggle="tooltip" data-placement="top" title="Excluir">
                                                <button class="item" data-toggle="modal" data-target="#ModalExcluir{{$user->id}}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                    <!-- Modal com formulário para alteração dos dados do usuário selecionado -->
                                    @include('layouts.modals.modalUser', [
                                    'id' => 'ModalAlterar'.$user->id,
                                    'title' => 'Alterar Usuário',
                                    'btn' => 'Salvar Alterações',
                                    'lbl_pass1' => 'Nova Senha',
                                    'lbl_pass2' => 'Confirme a Nova Senha',
                                    'method' => 'patch',
                                    'action' => route('admin.user.update'),
                                    'user' => $user
                                    ])
                                    <!-- Fim do modal -->

                                    <!-- Modal para confirmação da exclusão  -->
                                    @include('layouts.modals.modalDelete', [
                                    'id' => 'ModalExcluir'.$user->id,
                                    'title' => 'Excluir Usuário',
                                    'message' => 'Confirma a exclusão do usuário '.$user->name.' da aplicação?',
                                    'action' => route('admin.user.destroy'),
                                    'variable' => $user
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

            if (status == data[3] || status == 'TODOS') {
                return true;
            }
            if (document.getElementById('users') == settings.nTable) {
                return false;
            } else {
                return true;
            }
        }
    );

    $(function() {
        var table = $('#users').DataTable({
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
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 6000);
    });
</script>
@endsection