@extends('admin.home')

@section('title','- Relatório')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6">
                    @if(session('msg-error'))
                    <div class="alert alert-danger">
                        <p>{{session('msg-error')}}</p>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Relatórios</div>
                        <div class="card-body">
                            <div class="login-content">
                                <div class="login-form">
                                    <form action="{{ route('admin.report.getReport') }}" method="get">

                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="min">Data Inicial: </label>
                                                <div class="rs-select2--light rs-select2--md">
                                                    <input class="form-control" type="text" name="min" datepicker placeholder="Data Inicial" required readonly autocomplete="off" />
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="max">Data Final: </label>
                                                <div class="rs-select2--light rs-select2--md">
                                                    <input class="form-control" type="text" name="max" datepicker placeholder="Data Final" required readonly autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="report"> </label>
                                                <select name="report" id="report" class="form-control selectpicker">
                                                    <option value="1">RECEITAS x CLIENTES</option>
                                                    <option value="2">DESPESAS x FORNECEDOR</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>

                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">gerar relatório</button>
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

@section('script')
<script>
    $(function() {
        $("[datepicker]").datepicker();
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 6000);
    });
</script>
@endsection