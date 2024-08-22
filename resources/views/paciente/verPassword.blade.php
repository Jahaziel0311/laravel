@extends('plantillas.plantilla')

@section('titulo')
    Ver Password Paciente
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('style.css')}}">

   
@endsection

@section('logopantalla')
    <i class="fas fa-user"></i> 
@endsection

@section('titulopantalla')
    Paciente
@endsection

@section('contenido')
    <div class="text-center">
        <h1>Ver Datos de Ingreso del Paciente</h1>
    </div>

    <!--muestro el error-->
    @error('status')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
    <script>
        $(".alert").alert();

    </script>
    @enderror
    <!-- fin del error-->

    <div id="cardcrear" class="card col-lg-8">

        <div class="card-body">
              <div class="text-center col-12">
                    <h1>Hola {{$paciente->nombre_paciente}}!</h1>
              </div>
              <div class="text-center col-12">
                    <p>Hemos creado para ti una cuenta en nuestro sistema webvalmar.com</p>
              </div>
              <br>
              <br>              
              <div class="text-center">
                    <div class="row">
                        <div class="col-6">
                            <h2>Usuario:</h2>
                        </div>
                        <div class="col-6">
                            <h2>{{$paciente->identificacion_paciente}}</h2>
                        </div>
                        <div class="col-6">
                            <h2>Contraseña:</h2>
                        </div>
                        <div class="col-6">
                            <h2>{{$password}}</h2>
                        </div>
                    </div>
                   
              </div>
        </div>
    </div>

@endsection
@section('footer')
    @include('plantillas.footer')
@section('contenidofooter')

@show


@endsection
