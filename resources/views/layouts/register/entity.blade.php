@extends('admin.home')

@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCadastrarEntidade"><i class="fas fa-plus"></i> Novo {{ $tipoEntidade }}</button> <br><br>

    <!-- Modal com formulário para cadastro de nova entidade -->
    @include('layouts.register.modals.modalEntity', [
    'id' => 'ModalCadastrarEntidade',
    'labelledby' => 'Cadastrar '.$tipoEntidade,
    'title' => 'Cadastrar '.$tipoEntidade,
    'btn' => 'Cadastrar',
    'method' => 'put',
    'action' => route('admin.entity.store', $e)
    ])
    <!-- Fim do modal -->

    <table class="table table-sm table-hover table-bordered" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{$tipoEntidade}}</th>
                <th scope="col">Documento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th width="80" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entities as $entity)
            <tr>
                <th scope="row">{{$entity->id}}</th>
                <td>{{$entity->name}}</td>

                @if (!empty($entity->cnpj))
                <td>{{$entity->cnpj}}</td>
                @else
                <td>{{$entity->cpf}}</td>
                @endif

                <td>{{$entity->city}}</td>
                <td>{{$entity->state}}</td>

                <!-- Botão editar e deletar entidade acionam modal -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAlterarEntidade{{$entity->id}}"><i class="fas fa-edit"></i></button>
                    <input type="hidden" name="id" value="{{$entity->id}}">
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeletar{{$entity->id}}"><i class="far fa-trash-alt"></i></button>
                </td>

                <!-- Modal para confirmação da exclusão  -->
                @include('layouts.modalDelete', [
                'id' => 'ModalDeletar'.$entity->id,
                'title' => 'Excluir '.$tipoEntidade,
                'message' => 'Confirma a exclusão deste '.strtolower($tipoEntidade).' da aplicação?',
                'action' => route('admin.entity.destroy'),
                'variable' => $entity
                ])
                <!-- Fim do modal -->

                <!-- Modal com formulário para alteração dos dados do fornecedor selecionado -->
                @include('layouts.register.modals.modalEntity', [
                'id' => 'ModalAlterarEntidade'.$entity->id,
                'title' => 'Alterar '.$tipoEntidade,
                'btn' => 'Salvar Alterações',
                'labelledby' => 'Alterar '.$tipoEntidade,
                'method' => 'patch',
                'action' => route('admin.entity.update')
                ])
                <!-- Fim do modal -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<!-- Adicionando Javascript -->
<script type="text/javascript">
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('street').value = ("");
        // document.getElementById('bairro').value = ("");
        // document.getElementById('cidade').value = ("");
        // document.getElementById('uf').value = ("");
        // document.getElementById('ibge').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('street').value = (conteudo.logradouro);
            console.log(conteudo.logradour)
            // document.getElementById('bairro').value = (conteudo.bairro);
            // document.getElementById('cidade').value = (conteudo.localidade);
            // document.getElementById('uf').value = (conteudo.uf);
            // document.getElementById('ibge').value = (conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('street').value = "...";
                // document.getElementById('bairro').value = "...";
                // document.getElementById('cidade').value = "...";
                // document.getElementById('uf').value = "...";
                // document.getElementById('ibge').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>
@endsection