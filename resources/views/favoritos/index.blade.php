@extends('layouts.app')
@section('title', 'Sitios favoritos | AccionPlus')
@section('content')

    <!-- NavBar -->
    @include('partials.nav')

    <div class="container">
        <div class="text-center mt-4">
            <br>
            <h1>Sitios favoritos</h1>
        </div>
        <div class="row justify-content-center mt-2 mb-5">
            <div class="col-md-8">
                <p class="mt-5 text-justify">En esta parte del sistema puedes consultar tus sitios web favoritos, además,
                    tienes las opciones de <b>añadir, editar y eliminar</b> un sitio web favorito.</p>

                <!-- Mensaje de confirmación al momento de ejecutar una funcionalidad -->
                @if (session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="rounded">
                    <table class="table">
                        <thead class="background-blue text-white text-center">
                            <tr>
                                <th>Titulo</th>
                                <th>Tema</th>
                                <th>Enlace</th>
                                <th>Fecha creación</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <!-- se recorren los datos para mostrarlos en la tabla -->
                            @forelse ($favoritos as $favorito)
                                <tr>
                                    <td class="pt-3">{{ $favorito->titulo }}</td>
                                    <td class="pt-3">{{ $favorito->tema }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ $favorito->url }}" target="blank"><i
                                                class="fas fa-external-link-alt"></i></a>
                                    </td>
                                    <td class="pt-3">{{ $favorito->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-warning m-1"
                                            href="{{ route('favoritos.edit', $favorito->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('favoritos.destroy', $favorito->id) }}" id="formDelete"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-danger m-1"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                                <!-- en caso de que no hayan registros -->
                                <div class="text-center">
                                    <th>No hay ningún usuario registrado</th>
                                </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8 text-right mt-4">
                <a class="btn btn-success" href="{{ route('favoritos.create') }}"><i
                        class="fas fa-plus-circle mr-2"></i>añadir sitio favorito</a>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <!-- Script para eliminar un favorito-->
    <script src="{{ asset('js/confirmDelete.js') }}"></script>
@endsection
