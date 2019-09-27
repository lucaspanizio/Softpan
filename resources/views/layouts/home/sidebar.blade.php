<!-- Scrollbar CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

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
            <a href="{{ route('admin.entity.index', 'C') }}" class="list-group-item" data-parent="#menu2"><i class="far fa-handshake"></i> Clientes</a>  
            <a href="{{ route('admin.entity.index', 'F') }}" class="list-group-item" data-parent="#menu2"><i class="fas fa-truck"></i> Fornecedores</a>
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

<!-- Scrollbar jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

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