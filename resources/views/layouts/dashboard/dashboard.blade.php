@extends('admin.home')

@section('title', '- Painel de Controle')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md">
                    <div class="au-card m-b-20">
                        <div class="au-card-inner">
                            <div class="chartjs-size-monitor" >
                                <div class="chartjs-size-monitor-expand" >
                                    <div ></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" >
                                    <div ></div>
                                </div>
                            </div>
                            <h3 class="title-2 m-b-40">Receita x Despesas (Mensal)</h3>
                            <canvas id="barChart" height="260" width="390" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-lg">
                            <div class="statistic__item">
                                <span class="desc"><b>Receitas (Anual)</b></span>
                                <h2 class="number" style="color:green">10,368</h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-lg">
                            <div class="statistic__item">
                                <span class="desc"><b>Despesas (Anual)</b></span>
                                <h2 class="number" style="color:red">388,688</h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-money-off"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection