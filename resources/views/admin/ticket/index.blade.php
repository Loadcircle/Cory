@extends('layouts.app')
@section('content')
<div id="ticket" class="container">
    <h1> @{{ tittle }}</h1>
        <table class="table table-hover table-stripe ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>N° de Boleta</th>
                    <th>Local</th>
                    <th>Consumo</th>
                    <th>Fecha de Ingreso</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ticket in tickets">
                    <td>@{{ ticket.id }}</td>
                    <td>@{{ ticket.name }}</td>
                    <td>@{{ ticket.lastname }}</td>
                    <td>@{{ ticket.rut }}</td>
                    <td>@{{ ticket.email }}</td>
                    <td>@{{ ticket.phone }}</td>
                    <td>@{{ ticket.ticket_number }}</td>
                    <td>@{{ ticket.l_name }}</td>
                    <td>@{{ ticket.consume }}</td>
                    <td>@{{ ticket.created_at }}</td>
                </tr>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li class="page-item" v-if="paginate.current_page > 1">
                    <a class="page-link" href="" @click.prevent="changePage(paginate.current_page - 1)">
                        <span>Anterior</span>
                    </a>
                </li>
                <li class="page-item " v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                    <a class="page-link" href="#" @click.prevent="changePage(page)">
                        @{{ page }}
                    </a>
                </li>
                <li class="page-item" v-if="paginate.current_page < paginate.last_page">
                    <a class="page-link" href="" @click.prevent="changePage(paginate.current_page + 1)">
                        <span>Siguiente</span>
                    </a>
                </li>
            </ul>
        </nav>
        <pre>
            @{{ $data }}
        </pre>
</div>

@endsection
