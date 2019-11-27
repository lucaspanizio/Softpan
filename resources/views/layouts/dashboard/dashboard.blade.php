@extends('admin.home')

@section('title', '- Painel de Controle')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md">
                    <div class="au-card m-b-20">
                        <div class="au-card-inner">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div></div>
                                </div>
                            </div>
                            <h3 class="title-2 m-b-40">Receita x Despesas (Mensal)</h3>
                            <canvas id="barChart" height="260" width="390" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>

                </div>
            </div>

            {{-- <div class="col-lg-3"> --}}
            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg">
                    <div class="statistic__item">
                        <h3 class="title-2 m-b-50">Receitas (Anual)</h3>
                        <h2 class="number" style="color:#63c76a">{{ 'R$ '.number_format($sum_r,2, ',', '.') }}</h2>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-lg">
                    <div class="statistic__item">
                        <h3 class="title-2 m-b-50">Despesas (Anual)</h3>
                        <h2 class="number" style="color:#ff4b5a">{{ 'R$ '.number_format($sum_p,2, ',', '.') }}</h2>
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

<script>
    $(document).ready(function () {
        try {        
        var ctx = document.getElementById("barChart");
        if (ctx) {
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'bar',
                defaultFontFamily: 'Poppins',
                data: {
                    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    datasets: [{
                            label: "Receitas",
                            data: [{{ $receivables }}], 
                            borderColor: "green",
                            borderWidth: "0",
                            backgroundColor: "#63c76a",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Despesas",
                            data: [{{ $payables }}],
                            borderColor: "red",
                            borderWidth: "0",
                            backgroundColor: "#ff4b5a",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }


    } catch (error) {
        console.log(error);
    } 
    });
    
</script>
@endsection