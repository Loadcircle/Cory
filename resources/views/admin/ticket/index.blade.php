@extends('layouts.app')
@section('content')
<div id="ticket" class="container relative" v-cloak v-if="active">
    <div class="row">
        <div class="col-md-6 col-12">
            <h1 class=""> @{{ tittle }}</h1>
        </div>
        <div class="col-md-6 col-12">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary my-1" @click.prevent="goCounter">Top Boletas</button>
                        </div>
                        <div class="col-6">
                            <div class="dropdown my-1" >
                                <button  class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Locales
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" v-for="local in locals" @click.prevent="Local(local.id)">@{{ local.name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div v-if="paginate" class="dropdown">
                        <button  class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resultados por pagina
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" @click.prevent="MaxResults(20)">20</a>
                            <a class="dropdown-item" href="#" @click.prevent="MaxResults(50)">50</a>
                            <a class="dropdown-item" href="#" @click.prevent="MaxResults(0)">Mostrar todo</a>
                        </div>
                    </div>
                    <button  class="btn" type="button" v-else @click.prevent="getTickets()">
                        Mostrar todos
                    </button>
                </div>
            </div>

        </div>
    </div>

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
                    <th>Fecha de Ingreso</th>
                    <th>Consumo</th>
                </tr>
            </thead>
            <div class="loader" v-if="loader"></div>
            <tbody v-if="!loader">
                <tr v-for="ticket in tickets">
                    <td>@{{ ticket.id }}</td>
                    <td>@{{ ticket.name }}</td>
                    <td>@{{ ticket.lastname }}</td>
                    <td>
                        <a href="#" @click.prevent="RutFilter(ticket.rut)">
                                @{{ ticket.rut }}
                        </a>
                    </td>
                    <td>
                        <a href="#" @click.prevent="EmailFilter(ticket.email)">
                                @{{ ticket.email }}
                        </a>
                    </td>
                    <td>@{{ ticket.phone }}</td>
                    <td>@{{ ticket.ticket_number }}</td>
                    <td>@{{ ticket.l_name }}</td>
                    <td>@{{ ticket.created_at }}</td>
                    <td>
                        <button class="btn btn-consume" v-on:click.prevent="EditConsume(ticket)">@{{ ticket.consume }}</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6 col-12">
                <nav v-if="paginate">
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
            </div>
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-6">
                        <p v-if="paginate">Boletas totales: @{{ paginate.total }}</p>
                    </div>
                    <div class="col-6">
                        <p>Consumo total registrado: @{{ total_consume }} $</p>
                    </div>
                </div>
            </div>
        </div>

@include('admin.ticket.consume')
</div>

<div id="counter" class="container" v-cloak v-if="active">
    <div class="row">
        <div class="col-md-6 col-12">
            <h1 class=""> @{{ tittle }}</h1>
        </div>
        <div class="col-md-6 col-12">
            <button class="btn btn-primary" @click.prevent="GoTickets">Administrar Boletas</button>
        </div>
    </div>


    <div class="loader" v-if="loader"></div>
    <div v-if="!loader">
        <table class="table table-hover table-stripe ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rut</th>
                    <th>Boletas Registradas</th>
                    <th>Ultimo registro</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="counter in counters">
                    <td>@{{ counter.id }}</td>
                    <td>
                        <a href="#" @click.prevent="GoRut(counter.rut)">
                                @{{ counter.rut }}
                        </a>
                    </td>
                    <td>@{{ counter.number }}</td>
                    <td>@{{ counter.updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
