    <form method="POST" v-on:submit.prevent="Consume(FillConsume.id)">
        @csrf
        @method('PUT')
        <div class="modal fade" id="edit">
            <div class="modal-dialog">
                <div class="modal-content container">
                    <div class="moda-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Editar Consumo de boleta @{{ FillConsume.ticket_number }}</h4>
                    </div>
                    <div class="modal-body">
                        <label for="consume">Editar Consumo</label>
                        <input type="text" name="consume" class="form-control" v-model="FillConsume.consume">
                        <span v-for="error in errors" class="text-danger">@{{ error.consume }}</span>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </div>
            </div>
        </div>
    </form>
