@extends('admin.home')

@section('content')
<div class="container">

    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
                <th scope="col">Situação</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->role}}</td>
                <td></td>
                <td><button type="button" class="btn btn-warning"><i class="fas fa-user-edit"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!-- Parametros de formatação da tabela -->
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ resultados por página",
                "zeroRecords": "",
                "search": "Procurar",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum resultado encontrado",
                "infoFiltered": "",
                "paginate": {
                    "first": "Primeira",
                    "last": "Última",
                    "next": "Próxima",
                    "previous": "Início"
                }
            }
        });
    });
</script>


@endsection