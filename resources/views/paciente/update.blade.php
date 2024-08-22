@extends('plantillas.plantilla')

@section('titulo')
    Modificar Paciente
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
        <h1>Modificar Paciente</h1>
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

      <div class="card-body p-0">
      @foreach($resultado as $fila)
              <form action="{{route('paciente.save')}}" method="POST" role="form" autocomplete="off">
                @csrf
                <br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputcedula">Cédula</label>
                        <input type="text" class="form-control" id="inputcedula" placeholder="Ejemplo:8-888-8888" name="txtcedula"
                            required value="{{$fila->identificacion_paciente}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputsexo">Sexo</label>
                      @if($fila->sexo_paciente == 'm')
                      <div class="form-check col-md-6">
                          <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m" checked>
                          <label class="form-check-label" for="radio1">Masculino</label>
                      </div>
                      <div class="form-check col-md-6">
                          <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f">
                          <label class="form-check-label" for="radio2">Femenino</label>
                      </div>
                      @else
                      <div class="form-check col-md-6">
                          <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m">
                          <label class="form-check-label" for="radio1">Masculino</label>
                      </div>
                      <div class="form-check col-md-6">
                          <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f" checked>
                          <label class="form-check-label" for="radio2">Femenino</label>
                      </div>
                      @endif
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputnombre">Nombre</label>
                        <input type="text" class="form-control" id="inputnombre" placeholder="Ejemplo:Juan" name="txtnombre"
                          required value="{{$fila->nombre_paciente}}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputapellido">Apellido</label>
                        <input type="text" class="form-control" id="inputapellido" placeholder="Ejemplo:Perez" name="txtapellido"
                            required value="{{$fila->apellido_paciente}}" >
                    </div>
                    
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputfecnac">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="inputfecnac" name="txtfecnac"
                            required value="{{$fila->fecha_nacimiento_paciente}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputtelefono">Telefono</label>
                        <input type="text" class="form-control" id="inputtelefono" placeholder="Ejemplo:6666-6666" name="txttelefono"
                          required value="{{$fila->telefono_paciente}}">
                    </div>
                </div>
                <label for="">Correo</label>
                <div class="input-group flex-nowrap">

                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Ejemplo:juan@gmail.com" aria-label="Username"
                        aria-describedby="addon-wrapping" name="txtemail"  value="{{$fila->email_paciente}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Comentario</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="txtComentario" rows="3">{{$fila->comentario_paciente}}</textarea>
                </div>

                <input type="hidden" name="txtid" id="inputtxtid" class="form-control" value="{{$fila->id}}">
                <br>
                <br>
               
                <div class="row justify-content-around"> 
                    <div class="col-4"> 
                        <button type="submit" id="botoncrear" class="btn btn-primary btn-lg"><i class="fas fa-check"></i> Guardar</button>
                    </div>

                    <div class="col-4">
                        <a href="{{route('paciente.index')}}" class="btn btn-danger  btn-lg" id="botoncrear"><i class="fas fa-times"></i> Cancelar</a>
                    </div>
                
                </div>
                <br>
                
              </form>
              @endforeach
        </div>
    </div>

@endsection
@section('footer')
    @include('plantillas.footer')
@section('contenidofooter')

@show
@endsection