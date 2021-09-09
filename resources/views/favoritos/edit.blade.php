@extends('layouts.app')
@section('title', 'Editar sitio | AccionPlus')
@section('content')

    <!-- NavBar -->
    @include('partials.nav')

    <div class="container">
        <div class="text-center mt-4">
            <br>
            <h1>Editar sitio favorito</h1>
        </div>
        <div class="row justify-content-center mt-2 mb-5">
            <div class="col-md-8">
                <p class="mt-5 text-justify">{{ auth()->user()->name }}, en esta vista puedes editar cualquier registro que selecciones, solo falta que llenes los campos correctamente para seguir disfrutando de tus publicaciones.</p>
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Editar registro de <b>{{ $favorito->titulo }}</b></h5>
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
                            <div class="col-md-6">
                                <form action="{{ route('favoritos.update', $favorito->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <label for="titulo">Titulo: </label>
                                    <input type="text" class="form-control" name="titulo" id="titulo"
                                        value="{{ $favorito->titulo }}"><br>
                                    <label for="tema">Tema: </label>
                                    <input type="text" class="form-control" name="tema" id="tema"
                                           value="{{ $favorito->tema }}"><br>
                                    <label for="url">URL (enlace o dirección del sitio web): </label>
                                    <input type="url" class="form-control" name="url" id="url"
                                        placeholder="https://www.example.com" value="{{ $favorito->url }}"><br>
                                    <button type="submit" class="btn btn-success" id="updateDataUser"><i
                                            class="fas fa-pencil-alt mr-3"></i>Actualizar sitio favorito</button>
                                </form>

                            </div>
                            <div class="col-md-6 text-center mt-3">
                                <img class="rounded-circle" src="{{ asset('img/edit-favorito.png') }}" alt="user" width="230">
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
