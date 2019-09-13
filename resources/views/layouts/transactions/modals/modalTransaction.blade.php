<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal" method="POST" action="{{$action}}">
                @method($method)
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if (!empty($transaction))
                    <input type="hidden" name="id" value="{{$transaction->id}}">
                    @endif                    

                    <div class="row">
                        <div class="col">
                            <label for="cellphone">Celular</label>
                            <input name="cellphone" type="text" class="form-control" value="1" id="cellphone">
                        </div>

                        <div class="col">
                            <label for="situation">Situação</label>
                            <select name="situation" id="situation" class="form-control">
                                <option value="1" {{ empty($transaction) ? 'selected' : (($transaction->situation == "1")?'selected':'') }}>A VENCER</option>
                                <option value="2" {{ empty($transaction) ? 'selected' : (($transaction->situation == "2")?'selected':'') }}>PAGO</option>
                                <option value="3" {{ empty($transaction) ? 'selected' : (($transaction->situation == "3")?'selected':'') }}>ATRASADO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>
</div>  