<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('favicon.ico')}}">
    <meta name="author" content="">
    <title>@yield('titulo'){{env('APP_NAME')}}</title>
    @yield('style')
    @yield('css')
    
    <!-- Custom fonts for this template-->
    <link href="https://webvalmar.com/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css')}}">

</head>

<?php 
    use App\Http\Controllers\Controller; 
    $pantallas_menu = Controller::pantallasMenuXUsuario();
    $cantidad_notificaciones = Controller::cantidadNotificaciones();
    $notificaciones = Controller::notificaciones();   
    
?>


<body id="page-top" @yield('bodyJs')>
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="">
                <img src="{{ asset('images/fondo.png') }}" style="width:80%"> 
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Funciones
            </div>

           
            

            <!-- Nav Item - Utilities Collapse Menu -->
            @foreach ($pantallas_menu as $pantalla_menu)
                @if ($pantalla_menu->padre == 0  and $pantalla_menu->estado_pantalla==1)
                                        
                    <li class="nav-item">
                        <a class="nav-link menuLateral collapsed" href="" data-toggle="collapse" data-target="#collapse{{$pantalla_menu->titulo_pantalla}}"
                            aria-expanded="true" aria-controls="collapse{{$pantalla_menu->titulo_pantalla}}">
                            
                            <span style="font-size: 110%;">{{$pantalla_menu->nombre_pantalla}}</span>
                            
                        </a>
                        <div id="collapse{{$pantalla_menu->titulo_pantalla}}" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white subMenuLateral py-2 collapse-inner rounded">
                                @if ($pantalla_menu->url_pantalla != "#")
                                    @if ($pantalla_menu->nombre_pantalla=='Orden de Laboratorio')
                                        <a class="collapse-item" href="{{$pantalla_menu->url_pantalla}}">Lista de Ordenes</a>
                                    @else
                                        <a class="collapse-item" href="{{$pantalla_menu->url_pantalla}}">Lista de {{$pantalla_menu->nombre_pantalla}}</a>
                                    @endif
                                    
                                @endif
                                @foreach($pantallas_menu as $sub_menu)
                                    @if($pantalla_menu->id == $sub_menu->padre and $sub_menu->estado_pantalla==1 )                             
                                        
                                        <a class="collapse-item" href="{{$sub_menu->url_pantalla}}">{{$sub_menu->nombre_pantalla}}</a>
                                                                            
                                    @endif
                                @endforeach                                
                            </div>
                        </div>
                    </li>    
                    
                @endif                
                
            @endforeach
            

            

           
            
            
            @yield('opcionmenu2')
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="font-weight-bold text-uppercase">@yield('titulopantalla')</div>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @if ($cantidad_notificaciones>0)
                                    <span class="badge badge-danger badge-counter">
                                        
                                        {{$cantidad_notificaciones}}
                                            
                                        
                                    </span>
                                @endif
                                
                            </a>
                                    <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificaciones
                                </h6>
                                @if ($cantidad_notificaciones==0)

                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        
                                        <div class="text-center">
                                            <p class="text-center">Sin notificaciones</p>
                                        </div>
                                    </a>
                                @else
                                    
                                
                                    @foreach ($notificaciones  as $notificacion)
                                            
                                        @if ($notificacion->type =='App\Notifications\notificacionsOrdenes')
                                            <?php
                                                $data = json_decode($notificacion->data, true);
                                                        
                                                $id_orden =  $data["orden_id"]; 
                                            ?>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('notificacion.orden', ['id'=> $id_orden] )}}">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    
                                                    <span class="font-weight-bold">
                                                        <?php
                                                            $data = json_decode($notificacion->data, true);
                                                                    
                                                            echo $data["mensaje"]; 
                                                        ?>
                                                        
                                                        
                                                    </span>
                                                </div>
                                            </a>
                                        @endif 
                                        @if ($notificacion->type =='App\Notifications\ordenTerminada')
                                            <?php
                                                $data = json_decode($notificacion->data, true);
                                                        
                                                $id_orden =  $data["orden_id"]; 
                                            ?>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('notificacion.ordenTerminada', ['id'=> $id_orden] )}}">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    
                                                    <span class="font-weight-bold">
                                                        <?php
                                                            $data = json_decode($notificacion->data, true);
                                                                    
                                                            echo $data["mensaje"]; 
                                                        ?>
                                                        
                                                        
                                                    </span>
                                                </div>
                                            </a>
                                        @endif 
                                        @if ($notificacion->type =='App\Notifications\nuevoUsuario')
                                            <?php
                                                $data = json_decode($notificacion->data, true);
                                                        
                                                $identificacion =  $data["identificacion_paciente"]; 
                                            ?>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('paciente.verPassword', ['id'=> $identificacion ] )}}">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    
                                                    <span class="font-weight-bold">
                                                        <?php
                                                            $data = json_decode($notificacion->data, true);
                                                                    
                                                            echo $data["mensaje"]; 
                                                        ?>
                                                        
                                                        
                                                    </span>
                                                </div>
                                            </a>
                                        @endif    
                                        
                                        
                                    @endforeach
                                @endif
                                
                            </div>
                        </li>
                        <!-- Nav Item - Messages -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>  --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('nombre_usuario')}}</span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                @if (Session::has('usuario_log_id'))
                                    <a class="dropdown-item" href="{{ route('usuario.update.password', ['id' => Session::get('usuario_log_id')]) }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cambiar Contraseña
                                    </a>
                                @endif
                                
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('login.cerrar')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id='contenido'>
                    @yield('contenido') 
                
                </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @yield('footer')
            
            <!-- Bootstrap core JavaScript-->
            @yield('scriptsAdicinales')
            <script src="{{asset('js/main.js')}}"></script>
            <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
            <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

            <!-- Page level plugins -->
            <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <!-- Page level custom scripts -->
            <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
            <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
           
            
            
            <script>
                $('#dataTable').DataTable( {
                     
                    "language": {
                        
                        "processing": "Procesando...",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "infoThousands": ",",
                        "loadingRecords": "Cargando...",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": ">>",
                            "previous": "<<"
                        },
                        "aria": {
                            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad",
                            "collection": "Colección",
                            "colvisRestore": "Restaurar visibilidad",
                            "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                            "copySuccess": {
                                "1": "Copiada 1 fila al portapapeles",
                                "_": "Copiadas %d fila al portapapeles"
                            },
                            "copyTitle": "Copiar al portapapeles",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Mostrar todas las filas",
                                "1": "Mostrar 1 fila",
                                "_": "Mostrar %d filas"
                            },
                            "pdf": "PDF",
                            "print": "Imprimir"
                        },
                        "autoFill": {
                            "cancel": "Cancelar",
                            "fill": "Rellene todas las celdas con <i>%d<\/i>",
                            "fillHorizontal": "Rellenar celdas horizontalmente",
                            "fillVertical": "Rellenar celdas verticalmentemente"
                        },
                        "decimal": ",",
                        "searchBuilder": {
                            "add": "Añadir condición",
                            "button": {
                                "0": "Constructor de búsqueda",
                                "_": "Constructor de búsqueda (%d)"
                            },
                            "clearAll": "Borrar todo",
                            "condition": "Condición",
                            "conditions": {
                                "date": {
                                    "after": "Despues",
                                    "before": "Antes",
                                    "between": "Entre",
                                    "empty": "Vacío",
                                    "equals": "Igual a",
                                    "not": "No",
                                    "notBetween": "No entre",
                                    "notEmpty": "No Vacio"
                                },
                                "moment": {
                                    "after": "Despues",
                                    "before": "Antes",
                                    "between": "Entre",
                                    "empty": "Vacío",
                                    "equals": "Igual a",
                                    "not": "No",
                                    "notBetween": "No entre",
                                    "notEmpty": "No vacio"
                                },
                                "number": {
                                    "between": "Entre",
                                    "empty": "Vacio",
                                    "equals": "Igual a",
                                    "gt": "Mayor a",
                                    "gte": "Mayor o igual a",
                                    "lt": "Menor que",
                                    "lte": "Menor o igual que",
                                    "not": "No",
                                    "notBetween": "No entre",
                                    "notEmpty": "No vacío"
                                },
                                "string": {
                                    "contains": "Contiene",
                                    "empty": "Vacío",
                                    "endsWith": "Termina en",
                                    "equals": "Igual a",
                                    "not": "No",
                                    "notEmpty": "No Vacio",
                                    "startsWith": "Empieza con"
                                }
                            },
                            "data": "Data",
                            "deleteTitle": "Eliminar regla de filtrado",
                            "leftTitle": "Criterios anulados",
                            "logicAnd": "Y",
                            "logicOr": "O",
                            "rightTitle": "Criterios de sangría",
                            "title": {
                                "0": "Constructor de búsqueda",
                                "_": "Constructor de búsqueda (%d)"
                            },
                            "value": "Valor"
                        },
                        "searchPanes": {
                            "clearMessage": "Borrar todo",
                            "collapse": {
                                "0": "Paneles de búsqueda",
                                "_": "Paneles de búsqueda (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "Sin paneles de búsqueda",
                            "loadMessage": "Cargando paneles de búsqueda",
                            "title": "Filtros Activos - %d"
                        },
                        "select": {
                            "1": "%d fila seleccionada",
                            "_": "%d filas seleccionadas",
                            "cells": {
                                "1": "1 celda seleccionada",
                                "_": "$d celdas seleccionadas"
                            },
                            "columns": {
                                "1": "1 columna seleccionada",
                                "_": "%d columnas seleccionadas"
                            }
                        },
                        "thousands": "."
                    
                    }
                    @yield('ordenarTabla')
                } );
            </script>
            @yield('scriptsAdicinales2')
        
            
</body>

</html>
