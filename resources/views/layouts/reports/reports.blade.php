@extends('admin.home')

@section('content')
<div class="container">

    <form>
        <!-- Campo de data para filtro do período -->
        <div class="row justify-content-center">
            <div class="form-group px-3">
                <label for="initial_date">Data Inicial: </label>
                <div class='input-group date'>
                    <input type='date' id="initial_date" name="initial_date" class="form-control" />
                </div>
            </div>

            <div class="form-group px-3">
                <label for="final_date">Data Final: </label>
                <div class='input-group'>
                    <input type='date' id="final_date" name="final_date" class="form-control" />
                </div>
            </div>
        </div>

        <!-- Campo para seleção do relatório preferido -->
        <div class="row justify-content-center">
            <div class="form-group col-5 px-3">
                <label for="report">Relatório:</label>
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
        <br>
        <div class="row justify-content-center">
            <div class="form-group px-3">
                <button class="btn btn-success" type="submit">Imprimir Relatório</button>
            </div>
        </div>
    </form>
</div>
@endsection