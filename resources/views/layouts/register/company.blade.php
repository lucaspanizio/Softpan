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
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">Todas</option>
                                    <option value="">Ativas</option>
                                    <option value="">Inativas</option>
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
                                    <th scope="col">Empresa</th>
                                    <th scope="col">CNPJ</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr class="tr-shadow">
                                    <td>{{$company->id}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->cnpj}}</td>
                                    <td>{{$company->city}}</td>
                                    <td>{{$company->state}}</td>
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