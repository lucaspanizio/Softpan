<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome -->    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css />
    <!-- Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

   <!-- Jquery -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="wraper">

        <!-- Sidebar - Inicio  -->
        <nav id="sidebar">
            <div class="user-profile">
                <i class="fas fa-user-circle"></i>
                {{Auth::user()->name}}

                <div class="profile-userbutton">
                    <button type="button" class="btn btn-default btn-sm">Meus dados</button>
                </div>
            </div>

            <div class="list-group">
                <a href="#menu1" class="list-group-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="hidden-sm-down">Painel de Controle</span>
                </a>
                <a href="#menu2" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">
                    <i class="fas fa-plus-circle"></i>
                    <span class="hidden-sm-down">Cadastros <i class="fa fa-caret-down right"></i></span>
                </a>
                <div class="list-group collapse" id="menu2">
                    <a href="{{ route('admin.user.index') }}" class="list-group-item"><i class="fas fa-users"></i> Usuários</a>
                    <a href="{{ route('admin.company.index') }}" class="list-group-item" data-parent="#menu2"><i class="fas fa-building"></i> Empresas</a>
                    <a href="{{ route('admin.entity.index', 'client') }}" class="list-group-item" data-parent="#menu2"><i class="far fa-handshake"></i> Clientes</a>
                    <a href="{{ route('admin.entity.index', 'provider') }}" class="list-group-item" data-parent="#menu2"><i class="fas fa-truck"></i> Fornecedores</a>
                </div>

                <a href="{{ route('admin.transaction.index', 'receivable') }}" class="list-group-item">
                    <i class="fas fa-piggy-bank"></i>
                    <span class="hidden-sm-down">Contas a Receber</span>
                </a>

                <a href="{{ route('admin.transaction.index', 'payable') }}" class="list-group-item">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span class="hidden-sm-down">Contas a Pagar</span>
                </a>

                <a href="#menu5" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="hidden-sm-down">Relatórios <i class="fa fa-caret-down right"></i></span>
                </a>
                <div class="list-group collapse" id="menu5">
                    <a href="#" class="list-group-item" data-parent="#menu5">Despesa x Fornecedor</a>
                    <a href="#" class="list-group-item" data-parent="#menu5">Receita x Cliente</a>
                </div>
            </div>
        </nav>
        <!-- Sidebar - Fim  -->
        
        <div class="content">

            <!-- Navbar - Inicio -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a href="{{ route('logout') }}" class="btn btn btn-dark" id="navbar-btn" aria-label="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
            <!-- Navbar - Inicio -->

            <!-- Content -->
            @yield('content')

            <!-- Footer -->
        </div>
    </div>

    
    @yield('scripts')


    <!-- Parametros de formatação da tabela -->
    <script>
        $(document).ready(function() {
            //Guardei a table para encontrar as linhas selecionadas
            var table = $('#table').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ resultados por página",
                    "zeroRecords": "",
                    "search": "Procurar",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "",
                    "selected": " ",
                    "decimal": ",",
                    "thousands": ".",
                    "emptyTable": " Nenhum resultado encontrado ",
                    "infoFiltered": "",
                    "paginate": {
                        "first": "Primeira",
                        "last": "Última",
                        "next": '<i class="fas fa-angle-right"></i>',
                        "previous": '<i class="fas fa-angle-left"></i>'
                    }
                }
            });

            // $('#table tbody').on('click', 'tr', function() {
            //     $(this).toggleClass('selected');
            //     // alert(table.rows("Confirma o estorno de: "+'.selected').data().selected + ' receita(s)?');
            // });

            // function selectionRow(){
            //     return table.data().selected();
            // }

            // columnDefs: [{
            //     orderable: false                    
            // }],
            // select: {
            //     style: 'multi', // 'single', 'multi', 'os', 'multi+shift'                    
            // },
            // order: [
            //     [1, 'asc']
            // ]
        });
    </script>

    <!-- Scrollbar jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- Datepicker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.list-group-item').click(function(e) {
                // e.preventDefault();
                $('.list-group-item').removeClass('active');
                $(this).addClass('active');
            });

            $("#sidebar").mCustomScrollbar({
                theme: "inset-dark",
                scrollButtons: {
                    enable: true
                },
                scrollbarPosition: "outside"
            });
        });
    </script>

</body>

</html>