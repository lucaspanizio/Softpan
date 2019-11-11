<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Controle Financeiro Básico">
    <meta name="author" content="José Lucas Panizio">
    <meta name="keywords" content="contas a pagar, contas a receber, despesas, receitas">

    <!-- Title Page-->
    <title>SoftPan @yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="/cooladmin/css/font-face.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- Bootstrap CSS-->
    <link href="/cooladmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- Vendor CSS-->
    <link href="/cooladmin/vendor/animsition/animsition.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="/cooladmin/vendor/wow/animate.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/css-hamburgers/hamburgers.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="/cooladmin/vendor/slick/slick.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/select2/select2.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" media="all">
    <link href="/cooladmin/vendor/vector-map/jqvmap.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cooladmin/css/theme.css') }}">

    <!-- DatePicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
</head>

<body class="animsition ">
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo transition" href="{{route('home')}}">
                            <h1 style="color: white;">SoftPan
                                <img src="/cooladmin/images/icon/lupa-mobile-icon.png" alt="SoftPan" />
                            </h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="transition" href="{{ route('admin.dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i>Painel de Controle</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Cadastros
                                <span class="arrow">
                                    &nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                            </span>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a class="transition" href="{{ route('admin.user.index') }}">Usuários</a>
                                </li>
                                <li>
                                    <a class="transition" href="{{ route('admin.company.index') }}">Empresas</a>
                                </li>
                                <li>
                                    <a class="transition" href="{{ route('admin.entity.index', 'provider') }}">Fornecedores</a>
                                </li>
                                <li>
                                    <a class="transition" href="{{ route('admin.entity.index', 'client') }}">Clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="transition" href="{{ route('admin.transaction.index', 'receivable') }}">
                                <i class="fas fa-table"></i>Contas a Receber</a>
                        </li>
                        <li>
                            <a class="transition" href="{{ route('admin.transaction.index', 'payable') }}">
                                <i class="far fa-check-square"></i>Contas a Pagar</a>
                        </li>
                        <li>
                            <a class="transition" href="#">
                                <i class="fas fa-calendar-alt"></i>Relatórios</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a class="transition" href="{{route('home')}}">
                    <h1 style="color: white;">SoftPan
                        <img src="/cooladmin/images/icon/lupa-icon.png" alt="SoftPan" />
                    </h1>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">

                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="transition" href="{{ route('admin.dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i>Painel de Controle</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-plus-circle"></i>Cadastros
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="transition" href="{{ route('admin.user.index') }}">
                                        <i class="fas fa-users"></i>Usuários</a>
                                </li>
                                <li>
                                    <a class="transition" href="{{ route('admin.company.index') }}">
                                        <i class="fas fa-building"></i>&nbsp;Empresas</a>
                                </li>
                                <li>
                                    <a class="transition" href="{{ route('admin.entity.index', 'provider') }}">
                                        <i class="fas fa-truck"></i>Fornecedores</a>
                                </li>
                                <li>
                                    <a class="transition" href="{{ route('admin.entity.index', 'client') }}">
                                        <i class="far fa-handshake"></i>Clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="transition" href="{{ route('admin.transaction.index', 'receivable') }}">
                                <i class="fas fa-piggy-bank"></i>Contas a Receber</a>
                            <span class="inbox-num">3</span>
                        </li>
                        <li>
                            <a class="transition" href="{{ route('admin.transaction.index', 'payable') }}">
                                <i class="fas fa-hand-holding-usd"></i>Contas a Pagar</a>
                            <span class="inbox-num">3</span>
                        </li>
                        <li>
                            <a class="transition" href="#">
                                <i class="fas fa-clipboard-list"></i>Relatórios</a>
                        </li>
                        <li>
                            <a class="transition" href="#" aria-label="Sair" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>Sair</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->'

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ucwords(strtolower(Auth::user()->name))}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image py-1">
                                                    <i class="fas fa-user-circle fa-3x"></i>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ucwords(strtolower(Auth::user()->name))}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a class="transition" href="#">
                                                        <i class="zmdi zmdi-lock"></i>Alterar Senha</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a class="transition" href="#" aria-label="Sair" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Sair</a>
                                            </div>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- Content -->
            @yield('content')

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/cooladmin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/cooladmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/cooladmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/cooladmin/vendor/slick/slick.min.js">
    </script>
    <script src="/cooladmin/vendor/wow/wow.min.js"></script>
    <script src="/cooladmin/vendor/animsition/animsition.min.js"></script>
    <script src="/cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/cooladmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/cooladmin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/cooladmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/cooladmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/cooladmin/vendor/select2/select2.min.js">
    </script>
    <script src="/cooladmin/vendor/vector-map/jquery.vmap.js"></script>
    <script src="/cooladmin/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="/cooladmin/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/cooladmin/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="/cooladmin/js/main.js"></script>

    <!-- DatePicker js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $("#datepicker1").datepicker({
                autoclose: true,
                todayHighlight: true,
                dateFormat: 'dd/mm/yyyy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                today: "Hoje",
                monthsTitle: "Meses",
                clear: "Limpar",
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
            $("#datepicker2").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                locale: 'pt-br',
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        });
    </script>
</body>

</html>
<!-- end document-->