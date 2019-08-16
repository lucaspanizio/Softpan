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

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCadastrarCliente"><i class="fas fa-plus"></i> Novo Cliente</button> <br><br>

    <!-- Modal com formulário para cadastro de novo cliente -->
    @include('layouts.register.modals.modalClient', [
    'id' => 'ModalCadastrarCliente',
    'labelledby' => 'Cadastrar Cliente',
    'title' => 'Cadastrar Cliente',
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.client.store')
    ])
    <!-- Fim do modal -->

    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Documento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th width="80" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->name}}</td>
                @if (!empty($cliente->cnpj))
                <td>{{$cliente->cnpj}}</td>
                @else
                <td>{{$cliente->cpf}}</td>
                @endif
                <td>{{$cliente->city}}</td>
                <td>{{$cliente->state}}</td>

                <!-- Botão editar e deletar cliente acionam modal -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarCliente{{$cliente->id}}"><i class="fas fa-edit"></i></button>
                    <input type="hidden" name="id" value="{{$cliente->id}}">
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeletar{{$cliente->id}}"><i class="far fa-trash-alt"></i></button>
                </td>

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.modalDelete', [
                'id' => 'ModalDeletar'.$cliente->id,
                'title' => 'Excluir Cliente',
                'message' => 'Confirma a exclusão deste cliente da aplicação?',
                'action' => route('admin.client.destroy'),
                'variable' => 'cliente'               
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados do fornecedor selecionado -->
                @include('layouts.register.modals.modalClient', [
                'id' => 'ModalAlterarCliente'.$cliente->id,
                'title' => 'Alterar Cliente',
                'btn' => 'Salvar Alterações',
                'labelledby' => 'Alterar Cliente',
                'method' => 'patch',
                'action' => route('admin.client.update')
                
                ])
                <!-- Fim do modal -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection