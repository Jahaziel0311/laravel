<!doctype html>
<html lang="es">

    <head>

        <meta charset="utf-8" />
        <title>@yield('titulo') | {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <link href="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">
        
        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('layout.navbar')

            <!-- ========== Left Sidebar Start ========== -->
            @include('layout.sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
  
                        @yield('contenido')
                                

                                
                                

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Projects Workload</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-0">
                                                    <img src="assets/images/project-logo/project1.jpg" alt="project1" class="avatar-xs rounded-circle me-1">
                                                    <span><strong>Website & Blog</strong></span>
                                                </div>
                                                <small class="float-end text-muted ms-3 font-size-14">502h</small>
                                                <div class="progress mt-2 mb-4 bg-transparent" style="height:6px;">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 78%; border-radius:5px;" aria-valuenow="78"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="mb-0">
                                                    <img src="assets/images/project-logo/project2.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                                    <span><strong>New Office Building</strong></span>
                                                </div>
                                                <small class="float-end text-muted ms-3 font-size-14">320h</small>
                                                <div class="progress mt-2 mb-4 bg-transparent" style="height:6px;">
                                                    <div class="progress-bar bg-purple" role="progressbar" style="width: 60%; border-radius:5px;" aria-valuenow="60"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="mb-0">
                                                    <img src="assets/images/project-logo/project3.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                                    <span><strong>Product Devlopment</strong></span>
                                                </div>
                                                <small class="float-end text-muted ms-3 font-size-14">251h</small>
                                                <div class="progress mt-2 mb-4 bg-transparent" style="height:6px;">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 45%; border-radius:5px;" aria-valuenow="45"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="mb-0">
                                                    <img src="assets/images/project-logo/project4.jpg" alt="" class="avatar-xs rounded-circle me-1">
                                                    <span><strong>Market Research</strong></span>
                                                </div>
                                                <small class="float-end text-muted ms-3 font-size-14">121h</small>
                                                <div class="progress mt-2 bg-transparent" style="height:6px;">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 30%; border-radius:5px;" aria-valuenow="30"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Active Tasks List</h5>
                                        <div data-simplebar style="max-height: 260px;">
                                            <div class="todo-list">
                                                <div class="todo-box">

                                                    <button type="button" class="btn btn-link remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <div class="todo-task">
                                                        <label class="ckbox">
                                                            <input type="checkbox"><span>Icon change in Redesign App</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="todo-box">
                                                    <button type="button" class="btn btn-link remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <div class="todo-task">
                                                        <label class="ckbox">
                                                            <input type="checkbox" checked=""><span>Add search button Market
                                                                Research</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="todo-box">
                                                    <button type="button" class="btn btn-link remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <div class="todo-task">
                                                        <label class="ckbox">
                                                            <input type="checkbox"><span>Test new features in tablets</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="todo-box">
                                                    <button type="button" class="btn btn-link remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <div class="todo-task">
                                                        <label class="ckbox">
                                                            <input type="checkbox" checked=""><span>Send IOS App
                                                                documents</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="todo-box">
                                                    <button type="button" class="btn btn-link remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <div class="todo-task">
                                                        <label class="ckbox">
                                                            <input type="checkbox"><span>Connect API to pages</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="todo-box">
                                                    <button type="button" class="btn btn-link remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <div class="todo-task">
                                                        <label class="ckbox">
                                                            <input type="checkbox"><span>Icon change in Redesign App</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group custom-input">
                                            <input type="text" class="form-control todo-list-input" placeholder="Add task">
                                            <button class="btn btn-primary add-new-todo-btn">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!--end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Amezia.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                            data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                            data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!--Morris Chart-->

        <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{asset('assets/js/app.js')}}"></script>

    </body>

</html>