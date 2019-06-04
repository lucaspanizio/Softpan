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

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCadastrarEmpresa"><i class="fas fa-plus"></i> Nova Empresa</button> <br><br>

    <!-- Modal com formulário para cadastro de nova empresa -->
    @include('layouts.register.modals.modalCompany', [
    'id' => 'ModalCadastrarEmpresa',
    'title' => 'Cadastrar Empresa',
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.company.store')
    ])
    <!-- Fim do modal -->

    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Empresa</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th width="80" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
            <tr>
                <th scope="row">{{$empresa->id}}</th>
                <td>{{$empresa->name}}</td>
                <td>{{$empresa->cnpj}}</td>
                <td>{{$empresa->city}}</td>
                <td>{{$empresa->state}}</td>

                <!-- Botão editar e remover empresa aciona modal -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarEmpresa{{$empresa->id}}"><i class="fas fa-edit"></i></button>
                    <input type="hidden" name="id" value="{{$empresa->id}}">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt" data-toggle="modal" data-target="#ModalDeletar{{$empresa->id}}"></i></button>
                </td>

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.register.modals.modalDelete', [
                'id' => 'ModalDeletar'.$empresa->id,
                'title' => 'Excluir Empresa',
                'message' => 'Confirma a exclusão desta empresa da aplicação?',
                'action' => route('admin.company.destroy'),
                'variable' => 'empresa'               
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados do usuário selecionado -->
                @include('layouts.register.modals.modalCompany', [
                'id' => 'ModalAlterarEmpresa'.$empresa->id,
                'title' => 'Alterar Empresa',
                'btn' => 'Salvar Alterações',
                'method' => 'patch',
                'action' => route('admin.company.update')
                ])
                <!-- Fim do modal -->

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection