@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pacientes</p>
                                    <h5 class="font-weight-bolder">
                                        {{$pacientes_activos}}
                                    </h5>                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Medicos</p>
                                    <h5 class="font-weight-bolder">
                                        {{$medicos_activos}}
                                    </h5>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fa fa-user-md text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de Ordenes</p>
                                    <h5 class="font-weight-bolder">
                                        {{$ordenes_tot}}
                                    </h5>
                                
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de Examenes</p>
                                    <h5 class="font-weight-bolder">
                                        {{$examenes_tot}}
                                    </h5>                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Examenes del Dia</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                   
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes Pendientes</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_pendientes}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$porcentaje_pendiente}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes en Proceso</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_enproceso}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$porcentaje_enproceso}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes Terminadas</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_terminadas}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$porcentaje_terminado}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes Totales</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_totales}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Examenes del Mes</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                   
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes Pendientes</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_pendientes_mes}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$porcentaje_pendiente_mes}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes en Proceso</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_enproceso_mes}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$porcentaje_enproceso_mes}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes Terminadas</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_terminadas_mes}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$porcentaje_terminado_mes}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                   
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Ordenes Totales</h6>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$ordenes_totales_mes}}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Medicos Activos</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                   
                                    <tbody>
                                        @foreach ($medicos as $medico)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                    
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$medico->nombre_medico}}</h6>
                                                        </div>
                                                    </div>
                                                </td>                                            
                                                <td class="align-middle text-center">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span class="me-2 text-xs font-weight-bold">{{$medico->numero_registro}}</span>
                                                       
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>   
                                        @endforeach
                                                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
           
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

