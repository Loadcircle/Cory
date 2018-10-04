@extends('layouts.app')
@section('content')

<div id="local" class="container">
        <a href="#" class="btn btn-primary float-right my-3" data-toggle="modal" data-target="#create">Nuevo Local</a>
        <table class="table table-hover table-stripe ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Local</th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="local in locals">
                    <td>@{{ local.id }}</td>
                    <td>@{{ local.name }}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editLocal(local)">
                            Editar
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteLocal(local)">
                            Eliminar
                        </a>
                    </td>
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
    @include('admin.local.create')
    @include('admin.local.edit')
</div>

@endsection
