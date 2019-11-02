<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{$action}}">
                @method($method)
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">{{$title}}</h5>
                    <div class="close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" class="badge badge-pill badge-info" id="refresh_{{$transaction->id}}">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">

                    @if (!empty($transaction))
                    <input type="hidden" name="id" id="transaction_id" value="{{$transaction->id}}">
                    <input type="hidden" name="original_value" id="transaction_{{$transaction->id}}" value="{{$transaction->original_value}}">
                    @endif

                    <!-- <div class="form-group row justify-content-end px-3 ">
                        <button type="button" class="align-self-end" id="refresh_{{$transaction->id}}">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div> -->

                    <div class="form-group row">
                        <div class="col-4">
                            <label for="interest_rate">Juros</label>
                            <input class="form-control" type="text" id="interest_rate_{{$transaction->id}}" name="interest_rate" />
                        </div>

                        <div class="col-4">
                            <label for="penalty">Multa</label>
                            <input class="form-control" type="text" id="penalty_{{$transaction->id}}" name="penalty" />
                        </div>

                        <div class="col-4">
                            <label for="current_value">Valor Atual</label>
                            <input class="form-control" type="text" id="current_value_{{$transaction->id}}" disabled/>
                            <input type="hidden" type="text" id="hidden_current_value_{{$transaction->id}}" name="current_value" />
                        </div>                        

                        <script>
                            $('#refresh_{{$transaction->id}}').click(function() {
                                let juros = document.getElementById('penalty_{{$transaction->id}}').value;
                                let multa = document.getElementById('interest_rate_{{$transaction->id}}').value;
                                let atual = document.getElementById('current_value_{{$transaction->id}}');
                                let hidden_atual = document.getElementById('hidden_current_value_{{$transaction->id}}');
                                let original = {{$transaction->original_value}};

                                if (juros === "" && multa === "")
                                    atual.value = original;
                                else if (juros !== "" && multa === "")
                                    atual.value = parseFloat(original) + parseFloat(juros);                                
                                else if (juros === "" && multa !== "")
                                    atual.value = parseFloat(original) + parseFloat(multa);
                                else if (juros !== "" && multa !== "")
                                    atual.value = parseFloat(original) + parseFloat(juros) + parseFloat(multa);

                                hidden_atual.value = atual.value;
                            });
                        </script>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>
</div>