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
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">Todos</option>
                                    <option value="">Ativos</option>
                                    <option value="">Inativos</option>
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
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th col="20px">Email</th>
                                    <th>Situação</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="tr-shadow">
                                    <td>{{$user->id}}</td>
                                    <td class="desc">{{ ucwords(strtolower($user->name)) }}</td>
                                    <td><span class="block-email">{{ strtolower($user->email) }}</span></td>
                                    @if ($user->situation == '1')
                                    <td><span class="status--process">Ativo</span></td>
                                    @else
                                    <td><span class="status--denied">Inativo</span></td>
                                    @endif
                                    <td>
                                        <div class="table-data-feature">
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir">
                                                <button class="item" data-toggle="modal" data-target="#ModalAlterar{{$user->id}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </span>
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir">
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
                                <tr class="spacer"></tr>
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
