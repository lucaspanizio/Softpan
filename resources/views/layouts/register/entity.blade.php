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
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#ModalCadastrarEmpresa">
                                <i class="zmdi zmdi-plus"></i>incluir empresa</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{$tipoEntidade}}</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entities as $entity)
                                <tr class="tr-shadow">
                                    <td>{{$entity->id}}</td>
                                    <td>{{$entity->name}}</td>
                                    @if (!empty($entity->cnpj))
                                    <td>{{$entity->cnpj}}</td>
                                    @else
                                    <td>{{$entity->cpf}}</td>
                                    @endif
                                    <td>{{$entity->city}}</td>
                                    <td>{{$entity->state}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir">
                                                <button class="item" data-original-title="Alterar" data-toggle="modal" data-target="#ModalAlterarEntidade{{$entity->id}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </span>
                                            <input type="hidden" name="id" value="{{$entity->id}}">
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir">
                                                <button class="item" data-original-title="Deletar" data-toggle="modal" data-target="#ModalDeletar{{$entity->id}}">
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

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
@endsection