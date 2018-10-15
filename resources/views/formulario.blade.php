<div id="formulario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                @if ($errors && !empty(count($errors)))
                {{ $errors }}
                @endif
                <form class="container" action="{{ route('ticket.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido:</label>
                        <input class="form-control" type="text" name="lastname">
                    </div>

                    <div class="form-group">
                        <label for="rut">RUT:</label>
                        <input class="form-control" type="text" name="rut">
                    </div>

                    <div class="form-group">
                        <label for="email">Mail:</label>
                        <input class="form-control" type="text" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone">N° de contacto:</label>
                        <input class="form-control" type="text" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="locals_id">Local:</label>
                        <select class="form-control" name="locals_id" id="locals_id">

                                <option value="" >Selecciona un Local</option>
                                @foreach ($locals as $local)
                                <option value="{{ $local->id }}">{{ $local->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ticket_number">N° de boleta:</label>
                        <input class="form-control" type="text" name="ticket_number">
                    </div>
                    <div class="error">Los datos introducidos son incorrectos, por favor verificar tu Boleta<br><hr></div>
                    <div class="form-group">
                        <input class="form-control" type="submit" value="Enviar">
                    </div>
                </form>
          </div>
        </div>
      </div>
