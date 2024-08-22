@extends('plantillas.plantilla')

@section('titulo')
    Crear Paciente
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('style.css')}}">

    <script>
       
        var app_url ='{{env('APP_URL')}}'; 
        function validar(){           
          const url = app_url+'/consultar/'+document.getElementById('txtCedula').value;
          fetch(url)
            .then(respuesta => respuesta.json() )
            .then(respuesta => {let cedula=respuesta.cedula ;
                if (cedula == document.getElementById('txtCedula').value ){
                    document.getElementById('AlertaCedula').innerHTML ='Este paciente ya existe';                    
                    document.getElementById("txtCedula").className = "form-control is-invalid";

                    
                    
                }
                else{
                    document.getElementById('AlertaCedula').innerHTML =""
                    document.getElementById("txtCedula").className = "form-control is-valid";
                    
                    
                }
                if(document.getElementById("txtCedula").className == "form-control is-invalid"){
                    document.getElementById("botoncrear").disabled =true;
                }else{
                    document.getElementById("botoncrear").disabled =false;
                    
                }
            });
          
        }
        
    </script>
@endsection

@section('logopantalla')
    <i class="fas fa-user"></i> 
@endsection

@section('titulopantalla')
    Paciente
@endsection

@section('contenido')
    <div class="text-center">
        <h1>Crear Paciente</h1>
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
              <form action="" method="POST" role="form" autocomplete="off">
                @csrf
                <br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputcedula">Cédula</label>
                        <input type="text" class="form-control"  name="txtCedula" id="txtCedula" placeholder="Ejemplo:8-888-8888"  onfocusout="validar()"
                            value="{{old ('txtcedula')}}" required>
                            <small id="AlertaCedula" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputsexo">Sexo</label>
                      <div class="form-check col-md-6">
                          <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m" <?php if(old('txtsexo')=="m"){echo 'checked="checked"';}?> checked>
                          <label class="form-check-label" for="radio1">Masculino</label>
                      </div>
                      <div class="form-check col-md-6">
                          <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f" <?php if(old('txtsexo')=="f"){echo 'checked="checked"';}?>>
                          <label class="form-check-label" for="radio2">Femenino</label>
                        </div>
                    </div> 
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputnombre">Nombre</label>
                        <input type="text" class="form-control" id="inputnombre" placeholder="Ejemplo:Juan" name="txtnombre"
                        value="{{old ('txtnombre')}}" required >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputapellido">Apellido</label>
                        <input type="text" class="form-control" id="inputapellido" placeholder="Ejemplo:Perez" name="txtapellido"
                        value="{{old ('txtapellido')}}" required > 
                    </div>

                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        
                        <label for="inputfecnac">Fecha de Nacimiento</label>
                       
                        <input type="date" class="form-control" id="inputfecnac" name="txtfecnac"
                        value="{{old ('txtfecnac')}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputtelefono">Telefono</label>
                        <input type="text" class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txttelefono" date-format="dd-mm-yyyy"
                        value="{{old ('txttelefono')}}">
                    </div>
                </div>
               
                <label for="">Correo</label>
                <div class="input-group flex-nowrap">

                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Ejemplo:juan@gmail.com" aria-label="Username"
                        aria-describedby="addon-wrapping" name="txtemail" value="{{old ('txtemail')}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Comentario</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="txtComentario" rows="3">{{old ('txtComentario')}}</textarea>
                </div>
                <br>
                <br>
               
                <div class="row justify-content-around"> 
                    <div class="col-4"> 
                        <button type="submit" id="botoncrear" class="btn btn-primary btn-lg"><i class="fas fa-check"></i> Agregar Paciente</button>
                    </div>

                    <div class="col-4">
                        <a href="{{route('paciente.index')}}" class="btn btn-danger  btn-lg" id="botoncrear"><i class="fas fa-times"></i> Cancelar</a>
                    </div>
                
                </div>
                <br>
                
              </form>
        </div>
    </div>

@endsection
@section('footer')
    @include('plantillas.footer')
@section('contenidofooter')

@show


@endsection
