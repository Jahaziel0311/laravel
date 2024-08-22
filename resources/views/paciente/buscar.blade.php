@extends('plantillas.plantilla')

@section('titulo')
   Lista de Pacientes
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @include('scripts.validaciones')
@endsection
@section('logopantalla')
  <i class="fas fa-user"></i>
@endsection
@section('titulopantalla')
    Pacientes
@endsection

@section('contenido')

      <div class="container-fluid">

         

        <!--muestra el error-->
        @include('plantillas.errores')
        
        <!-- fin del error-->
        
        <div class="d-flex">
          <div class="mr-auto p-2">
            <p class="mb-4">Este listado muestra todos los pacientes que estan registrados en el sistema.</a>
            </p>
          </div>
          @if ($permisos['create']==1)
            <div class="p-2">
              <button type="button" class="btn btn-primary btn-sm btn-icon-split" id="addNewPaciente"                
                data-toggle="modal" data-target="#addNewPacienteModal">
                <span class="icon text-white-50">
                  <i class="fas fa-folder-plus"></i>
                </span>
                <span class="text">
                  Crear Nuevo Paciente
                </span>
              </button>
            </div>
              
          @endif
        </div> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" >Listado de Pacientes</h6>
            </div>
            
            <div class="card-body">
              
              
                <form action="" method="POST" role="form" autocomplete="off">
                  @csrf
                  <br>
                  <div class="form-row">
                    <div class="form-group col-md-2">
                    </div>
                      <div class="form-group col-md-8">
                          
                          <input type="text" class="form-control"  name="txtBuscar" id="txtBuscar" placeholder="Texto a buscar" 
                               required>
                              
                      </div>
                      <div class="form-group col-md-1">
                      </div>
                      <div class="form-group col-md-1">                        
                        
                        <button type="submit" id="botoncrear" class="btn btn-primary "><i class="fas fa-search"></i></button>
                      </div>
                      
                  </div>
                
                 
                  
                  <br>
                  
                </form>
              
            </div>
          
          </div>
        </div>
        <!-- /.container-fluid -->
        @include('modals.PacienteModals')

@endsection

@section('footer')
    @include('plantillas.footer')
@section('contenidofooter')

@show
@endsection
@section('ordenarTabla')

    ,"order": [[0,'desc']]
     ,"columns": [
      null,
      null,
      null,
      null,
      null,
      null,
      null,
      { "width": "16%" }
    ],
    "pageLength": 15,
    lengthMenu: [15, 30, 50, 100],
    

@endsection

