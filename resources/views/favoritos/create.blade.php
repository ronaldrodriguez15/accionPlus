@extends('layouts.app')
@section('title', 'Nuevo favorito | AccionPlus')
@section('content')

    <!-- NavBar -->
    @include('partials.nav')

    <div class="container">
        <div class="text-center mt-4">
            <br>
            <h1>Nuevo sitio favorito</h1>
        </div>
        <div class="row justify-content-center mt-2 mb-5">
            <div class="col-md-8">
                <p class="mt-5 text-justify">Aquí puedes crear un nuevo sitio favorito, solo llena los campos que se te piden para poder agregar tu nuevo registro.</p>
                <div class="card">
                    <div class="card-header text-center">
                        <h5><b>{{ auth()->user()->name }}</b>, crea tu nuevo registro</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session()->get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session()->get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="alert alert-dark text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Nombre del usuario: </b><i>{{ auth()->user()->name }}</i>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Correo del usuario: </b><i>{{ auth()->user()->email }}</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <!-- Formulario para insertar sitios favoritos -->
                                <form action="{{ route('favoritos.store') }}" method="post">
                                    @csrf
                                    <label for="titulo">Titulo: </label>
                                    <input type="text" class="form-control" name="titulo" id="titulo"><br>
                                    <label for="tema">Tema: </label>
                                    <input type="text" class="form-control" name="tema" id="tema"><br>
                                    <label for="url">URL (enlace del sitio web): </label>
                                    <input type="url" class="form-control" name="url" id="url" placeholder="https://www.example.com">
                                    <br>
                                    <button type="submit" class="btn btn-success" id="updateDataUser"><i
                                            class="fas fa-pencil-alt mr-3"></i>Guardar favorito</button>
                                </form>

                            </div>

                            <!-- Imagen del form (diseño) -->
                            <div class="col-md-6 text-center mt-3">
                                <img src="{{ asset('img/favorito.png') }}" alt="user" width="250">
                            </div>
                            
                            <!-- mensajes de validación -->
                            <div class="col-md-12 mt-4">
                                @if ($errors->any())

                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            <b>{{ $error }}</b>
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
