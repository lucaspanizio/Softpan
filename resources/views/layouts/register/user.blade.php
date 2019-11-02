@extends('admin.home')

@section('content')
<div class="container">

    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCadastrarUsuario"><i class="fas fa-plus"></i> Novo Usuário</button> <br><br>

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

    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
                <th width="80" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>

                <!-- Botão editar e remover usuário aciona modal -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarUsuario{{$user->id}}"><i class="fas fa-edit"></i></button>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeletar{{$user->id}}"><i class="far fa-trash-alt"></i></button>
                </td>

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.modals.modalDelete', [
                'id' => 'ModalDeletar'.$user->id,
                'title' => 'Excluir Usuário',
                'message' => 'Confirma a exclusão do usuário '.$user->name.' da aplicação?',
                'action' => route('admin.user.destroy'),
                'variable' => $user
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados do usuário selecionado -->
                @include('layouts.modals.modalUser', [
                'id' => 'ModalAlterarUsuario'.$user->id,
                'title' => 'Alterar Usuário',
                'btn' => 'Salvar Alterações',
                'lbl_pass1' => 'Nova Senha',
                'lbl_pass2' => 'Confirme a Nova Senha',
                'method' => 'patch',
                'action' => route('admin.user.update'),
                'user' => $user
                ])
                <!-- Fim do modal -->

            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection