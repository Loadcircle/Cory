<form method="POST" v-on:submit.prevent="createLocal">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content container">
                <div class="moda-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Nuevo Local</h4>
                </div>
                <div class="modal-body">
                    <label for="name">Crear Local</label>
                    <input type="text" name="name" class="form-control" v-model="newLocal">
                    <span v-for="error in errors" class="text-danger">@{{ error.name }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>
</form>
