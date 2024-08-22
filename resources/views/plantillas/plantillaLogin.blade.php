<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>@yield('titulo'){{env('APP_NAME')}}</title>
    @yield('style')
    @yield('css')
    
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css')}}">

</head>




<body id="page-top" onload="cargaPagina()">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               
                <!-- End of Topbar -->

               
                @yield('contenido') 
                
                <
                
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
            
            
            
            @yield('scriptsAdicinales2')
        
            
</body>

</html>
