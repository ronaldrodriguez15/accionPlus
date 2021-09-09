@extends('layouts.app')
@section('title', 'Usuarios registrados | AccionPlus')
@section('content')

    <!-- NavBar -->
    @include('partials.nav')

    <div class="container">
        <div class="text-center mt-4">
            <br>
            <h1>Consultar Usuarios</h1>
        </div>
        <div class="row justify-content-center mt-2 mb-5">
            <div class="col-md-8">
                <p class="mt-5 text-justify">En esta parte puedes consultar todos los usuarios activos del sistema, ten en cuenta que por temas de
                    seguridad no podrás modificarlos.</p>
                <div class="rounded">
                    <table class="table">
                        <thead class="background-blue text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo electronico</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            
                               @forelse ($usuarios as $usuario)
                               <tr>
                                <td>{{ $usuario['id'] }}</td>
                                <td>{{ $usuario['name'] }}</td>
                                <td>{{ $usuario['email'] }}</td>
                            </tr>
                               @empty
                                <th>No hay ningún usuario registrado</th>
                               @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
