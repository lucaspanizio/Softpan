<div id="{{$id}}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ $action }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    {{$title}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!empty($variable))
                    <input type="hidden" name="id" value="{{$variable->id}}">
                    @endif
                   
                    <p>{{$message}}</p>
                    <p class="text-danger"><small>Esta ação não pode ser revertida.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>