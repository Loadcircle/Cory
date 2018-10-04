<form method="POST" v-on:submit.prevent="updateLocal(fillLocal.id)">
        <div class="modal fade" id="edit">
            <div class="modal-dialog">
                <div class="modal-content container">
                    <div class="moda-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Editar Local</h4>
                    </div>
                    <div class="modal-body">
                        <label for="name">Editar Local</label>
                        <input type="text" name="name" class="form-control" v-model="fillLocal.name">
                        <span v-for="error in errors" class="text-danger">@{{ error.name }}</span>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </div>
            </div>
        </div>
    </form>
