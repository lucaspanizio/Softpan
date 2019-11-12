@extends('admin.home')

@section('title','- Relatório')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Relatórios</div>
                        <div class="card-body">
                            <div class="login-content">
                                <div class="login-form">
                                    <form action="" method="post">

                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="initial_date">Data Inicial: </label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="datepicker1" class="input-group" placeholder="Data inicial" />
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="final_date">Data Final: </label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="datepicker2" class="input-group" placeholder="Data Final" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="report"> </label>
                                                <select name="report" id="report" class="form-control">
                                                    <option value="0">RECEITAS x CLIENTES</option>
                                                    <option value="1">DESPESAS x FORNECEDOR</option>
                                                    <option value="2">LISTA DE USUÁRIOS</option>
                                                    <option value="3">LISTA DE CLIENTES</option>
                                                    <option value="4">LISTA DE FORNECEDORES</option>
                                                    <option value="5">LISTA DE RECEITAS</option>
                                                    <option value="6">LISTA DE DESPESAS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>

                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">imprimir relatório</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection