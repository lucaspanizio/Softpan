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

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCadastrarFornecedor"><i class="fas fa-plus"></i> Novo Fornecedor</button> <br><br>

    <!-- Modal com formulário para cadastro de novo fornecedor -->
    @include('layouts.register.modals.modalProvider', [
    'id' => 'ModalCadastrarFornecedor',
    'title' => 'Cadastrar Fornecedor',
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.provider.store')
    ])
    <!-- Fim do modal -->

    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Documento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th width="80" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fornecedores as $fornecedor)
            <tr>
                <th scope="row">{{$fornecedor->id}}</th>
                <td>{{$fornecedor->name}}</td>
                @if (!empty($fornecedor->cnpj))
                <td>{{$fornecedor->cnpj}}</td>
                @else
                <td>{{$fornecedor->cpf}}</td>
                @endif
                <td>{{$fornecedor->city}}</td>
                <td>{{$fornecedor->state}}</td>

                <!-- Botão editar fornecedor aciona modal -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarFornecedor{{$fornecedor->id}}"><i class="fas fa-edit"></i></button>
                    <input type="hidden" name="id" value="{{$fornecedor->id}}">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt" data-toggle="modal" data-target="#ModalDeletar{{$fornecedor->id}}"></i></button>
                </td>

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.register.modals.modalDelete', [
                'id' => 'ModalDeletar'.$fornecedor->id,
                'title' => 'Excluir Fornecedor',
                'message' => 'Confirma a exclusão deste fornecedor da aplicação?',
                'action' => route('admin.provider.destroy'),
                'variable' => 'fornecedor'               
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados do fornecedor selecionado -->
                @include('layouts.register.modals.modalProvider', [
                'id' => 'ModalAlterarFornecedor'.$fornecedor->id,
                'title' => 'Alterar Fornecedor',
                'btn' => 'Salvar Alterações',
                'method' => 'patch',
                'action' => route('admin.provider.update'),
                'fornecedor' => $fornecedor
                ])
                <!-- Fim do modal -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection