<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <!-- Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <!-- Table JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
</head>

<body>
    <div class="wraper">
        <!-- Sidebar  -->
        @include('layouts.home.sidebar')

        <div class="content">
            <!-- Navbar -->
            @include('layouts.home.navbar')

            <!-- Content -->
            @yield('content')

            <!-- Footer -->
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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

            $('#table tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
                // alert(table.rows("Confirma o estorno de: "+'.selected').data().selected + ' receita(s)?');
            });

            function selectionRow(){
                return table.data().selected();
            }

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
</body>

</html>