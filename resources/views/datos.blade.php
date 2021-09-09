@extends('layouts.app')
@section('title', 'Bienvenido | AccionPlus')
@section('content')

    <!-- NavBar -->
    @include('partials.nav')

    <div class="container">
        <div class="text-center mt-4">
            <br>
            <h1>Bienvenido {{ $user->name }}</h1>
        </div>
        <div class="row justify-content-center mt-2 mb-5">
            <div class="col-md-8">
                <p class="mt-5 text-justify"><b>FELICIDADES!!</b>, ya estás dentro del sistema, termina tu registro
                    completando los campos
                    faltantes, cuando termines de llenar toda tu información presiona el botón <b>Actualizar datos
                        basicos</b>,
                    asi de sencillo!!.
                </p>
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Datos basicos</h5>
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
                                <form action="{{ route('bienvenido.update', $user->id) }}" method="post" id="dataUser">
                                    @method('PUT')
                                    @csrf
                                    <label for="nombreUser">Nombre: </label>
                                    <input type="text" class="form-control" name="nombreUser" id="nombreUser"
                                        value="{{ $user->name }}" readonly>
                                    <label for="emailUser">Correo electronico: </label>
                                    <input type="text" class="form-control" name="emailUser" id="emailUser"
                                        placeholder="alguien@example.com" value="{{ $user->email }}" readonly>
                                    <label for="phoneUser">Telefono: </label>
                                    <input type="number" class="form-control" name="phoneUser" id="phoneUser"
                                        value="{{ $user->telefono }}">
                                    <label for="adressUser">Dirección: </label>
                                    <input type="text" class="form-control" name="adressUser" id="adressUser"
                                        placeholder="ej: carrera 3 # 15-22" value="{{ $user->direccion }}"><br>
                                    <button type="submit" class="btn btn-success" id="updateDataUser"><i
                                            class="fas fa-pencil-alt mr-3"></i>Actualizar datos
                                        basicos</button>
                                </form>

                            </div>
                            <div class="col-md-6 text-center mt-5">
                                <img class="rounded-circle" src="{{ asset('img/user-1.png') }}" alt="user" width="220">
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
@section('js')

    <!-- JQuery validate -->
    {{-- <script type="text/javascript" src="{{ asset('js/jQuery-validations/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jQuery-validations/additional-methods.min.js') }}"></script> --}}
   
    <!-- Script validate -->
    <script src="{{ asset('js/validations.js') }}">
    $(function(){

        // validación formulario actualizar datos (vista datos.blade.php)
        $('#dataUser').validate({
            rules: {
                nombreUser:{
                    required: true,
                },
                emailUser:{
                    required: true,
                },
                phoneUser:{
                    required: true,
                    number: true
                },
                adressUser:{
                    required: true,
                }
            },
            messages: {
                nombreUser:{
                    required: 'Por favor ingresa un nombre.',
                },
                emailUser:{
                    required: 'Por favor ingresa un correo electrónico.',
                },
                phoneUser:{
                    required: 'Por favor ingresa un número.',
                    number: 'Por favor ingresa un número valido.'
                },
                adressUser:{
                    required: 'Por favor ingresa una dirección.',
                }
            },
            sumbitHandler: function (form) {
                form.submit();
            }
        });
});
 

    </script>
@endsection
