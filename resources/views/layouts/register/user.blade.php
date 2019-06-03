@extends('admin.home')

@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCadastrarUsuario"><i class="fas fa-plus"></i> Novo Usuário</button> <br><br>

    <!-- Modal com formulário para cadastro de novo usuário -->
    @include('layouts.register.modals.modalUser', [
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
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->role}}</td>

                <!-- Botão editar e remover usuário aciona modal -->
                <td>                    
                    <form action="{{ route('admin.user.destroy') }}" method="POST">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarUsuario{{$usuario->id}}"><i class="fas fa-edit"></i></button>
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$usuario->id}}">
                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

                <!-- Modal com formulário para alteração dos dados do usuário selecionado -->
                @include('layouts.register.modals.modalUser', [
                'id' => 'ModalAlterarUsuario'.$usuario->id,
                'title' => 'Alterar Usuário',
                'btn' => 'Salvar Alterações',
                'lbl_pass1' => 'Nova Senha',
                'lbl_pass2' => 'Confirme a Nova Senha',
                'method' => 'patch',
                'action' => route('admin.user.update'),
                'usuario' => $usuario
                ])
                <!-- Fim do modal -->

            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection