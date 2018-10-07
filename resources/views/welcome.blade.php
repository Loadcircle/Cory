@extends('layouts.views')
@section('content')

    <h1>Vista de la landing</h1>


@if ($errors)
{{ $errors }}
@endif
<form class="container" action="{{ route('ticket.store') }}" method="POST">
   @csrf
   <div class="form-group row">
       <div class="col-4">
           <label for="name">Nombre</label>
           <input class="form-control" type="text" name="name">
           <label for="lastname">Apellido</label>
           <input class="form-control" type="text" name="lastname">
           <label for="rut">rut</label>
           <input class="form-control" type="text" name="rut">
       </div>
       <div class="col-4">
           <label for="email">email</label>
           <input class="form-control" type="text" name="email">
           <label for="phone">phone</label>
           <input class="form-control" type="text" name="phone">
       </div>
       <div class="col-4">
            <label for="locals_id">locals_id</label>
           <select class="form-control" name="locals_id" id="locals_id">
                <option>Selecciona un Local</option>
                @foreach ($locals as $local)
                <option value="{{ $local->id }}">{{ $local->name }}</option>
                @endforeach
           </select>
           <label for="ticket_number">ticket_number</label>
           <input class="form-control" type="text" name="ticket_number">
           <br>
           <input class="form-control" type="submit" value="enviar">
       </div>
   </div>
</form>

@endsection
