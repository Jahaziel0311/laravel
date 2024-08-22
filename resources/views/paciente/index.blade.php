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
          @if(Route::is('paciente.buscado') )
          <div class="p-2">
            <a href="{{route('paciente.busqueda')}}" type="button" class="btn btn-secondary btn-sm btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
                
              </span>
              <span class="text">
                Atras
              </span>
            </a>
          </div>
          @endif
        </div> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" >Listado de Pacientes</h6>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              
                <table class="table table-bordered text-center " id="dataTable" cellspacing="0"  style="width:100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cédula</th>
                      <th>Nombre</th>
                      <th>Sexo</th>
                      <th>Edad</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($resultado as $fila)
                    <tr style="font-size: 90%;">
                      <td>{{$fila->id}}</td>
                      <td>{{$fila->identificacion_paciente}}</td>
                      <td>{{$fila->nombre_paciente}} {{$fila->apellido_paciente}}</td>
                      <td>@if($fila->sexo_paciente=="m")M @else F @endif</td>
                      <td>{{\Carbon\Carbon::parse($fila->fecha_nacimiento_paciente)->age}}</td>
                      <td>{{$fila->telefono_paciente}}</td>
                      <td><p style="font-size: 90%;">{{$fila->email_paciente}}</p></td>
                      <td>
                        @if ($permisos['createOrder']==1)                        
                          <a class="btn btn-info btn-sm btnIcono" title="Crear Orden" href="{{route('orden_laboratorio.create2', ['id'=> $fila->id] )}}" class=""><i id="iconoBoton" class="fas fa-file-medical"></i></a>
                          
                        @endif     
                       
                        @if ($permisos['update']==1)
                          {{-- <a class="btn btn-success btn-sm " title="Modificar paciente" href="{{route('paciente.update', ['id'=> $fila->id] )}}" class=""><i id="iconoBoton" class="fas fa-user-edit"></i></a> --}}
                          <button type="button" class="btn btn-success btn-sm btnIcono " id="editPaciente"                
                            data-toggle="modal" data-target="#editarPacienteModal{{$fila->id}}">
                            <i id="iconoBoton" class="fas fa-user-edit"></i>
                          </button>
                          @include('modals.editarPacienteModals')
                        @endif
                        
                        @if ($permisos['delete']==1)
                          @if($fila->estado_paciente == 1)

                            <a class="btn btn-danger btn-sm btnIcono" title="Eliminar paciente" href="{{route('paciente.delete', ['id'=> $fila->id] )}}" onclick="
                              return confirm('Desea eliminar este paciente del sistema?')"><i id="iconoBoton" class="fas fa-user-times"></i></a>
                          
                          @else
                            
                            <a class="btn btn-warning btn-sm btnIcono" title="Desbloquear paciente" href="{{route('paciente.desbloquear', ['id'=> $fila->id] )}}" onclick="
                              return confirm('Desea desbloquear este paciente del sistema?')"><i id="iconoBotonW" class="fas fa-user-shield"></i></a>
                          
                          @endif 
                        @endif
                        
                         
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
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

