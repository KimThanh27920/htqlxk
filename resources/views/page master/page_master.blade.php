<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">
         <!-- Table datatable css -->
         <link href="\public\assets\libs\datatables\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        
         <link href="\public\assets\libs\datatables\buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
         <link href="\public\assets\libs\datatables\responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
         <link href="\public\assets\libs\datatables\select.bootstrap4.min.css" rel="stylesheet" type="text/css">
 
        <!-- App css -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link href="\public\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="\public\assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="\public\assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body >

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                            <span class="d-none d-sm-inline-block ml-1 font-weight-medium"> {{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow text-white m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="/logout" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="/home" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="\public\assets\images\logo_bus.jpg" alt="bus" height="100">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        {{-- <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="\public\assets\images\logo-sm.png" alt="" height="24">
                        </span> --}}
                    </a>

                    {{-- <a href="/home" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="\public\assets\images\logo-light.png" alt="" height="22">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="\public\assets\images\logo-sm-light.png" alt="" height="24">
                        </span>
                    </a> --}}
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="/home">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            {{-- <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-flip-horizontal"></i>
                                    <span> Layouts </span>
                                    <span class="badge badge-danger badge-pill float-right"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                    <li><a href="layouts-small-sidebar.html">Small Sidebar</a></li>
                                    <li><a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a></li>
                                    <li><a href="layouts-unsticky.html">Unsticky Layout</a></li>
                                    <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                </ul>
                            </li> --}}

                            <li class="menu-title mt-2">Components</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-package-variant-closed"></i>
                                    <span>Danh Sách</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                   
                                    <li>
                                        <a href="/home/staff/list">Nhân Viên</a>
                                    </li>
                                    <li>
                                        <a href="/home/dongialuong/list">Đơn Giá Lương</a>
                                    </li>
                                    <li>
                                        <a href="/home/buses/list">Tuyến Đường</a>
                                    </li>
                                    <li>
                                        <a href="/home/chuyen/list">Chuyến</a>
                                    </li>
                                    <li>
                                        <a href="/home/xe/list">Xe</a>
                                    </li>
                                    <li>
                                        <a href="/home/dongia/list">Đơn Giá</a>
                                    </li>
                                </ul>
                                   

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-package-variant-closed" ></i>
                                    <span> Quản Lý </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="/home/lichchay/list">Lịch Chạy</a>
                                    </li>
                                    <li>
                                        <a href="/home/vexe/list">Bán vé</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-puzzle-outline"></i>
                                    <span>Thống Kê</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="#"> Doanh Thu Tháng </a>
                                    </li>
                                    <li>
                                        <a href="#">Lương Nhân Viên</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @yield('content')
                    
                </div> <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                Họ & Tên: Trịnh Thị Kim Thanh <br>
                                MSSV: B1809512<br>
                                Lớp : Công Nghệ Thông Tin 4 - Khóa 44 <br>
                               
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="\public\assets\js\vendor.min.js"></script>

        <!--Morris Chart-->
        <script src="\public\assets\libs\morris-js\morris.min.js"></script>
        <script src="\public\assets\libs\raphael\raphael.min.js"></script>

        <!-- Dashboard init js-->
        <script src="\public\assets\js\pages\dashboard.init.js"></script>

        <!-- App js -->
        <script src="\public\assets\js\app.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Datatable plugin js -->
        <script src="\public\assets\libs\datatables\jquery.dataTables.min.js"></script>
        <script src="\public\assets\libs\datatables\dataTables.bootstrap4.min.js"></script>

        <script src="\public\assets\libs\datatables\dataTables.responsive.min.js"></script>
        <script src="\public\assets\libs\datatables\responsive.bootstrap4.min.js"></script>

        <script src="\public\assets\libs\datatables\dataTables.buttons.min.js"></script>
        <script src="\public\assets\libs\datatables\buttons.bootstrap4.min.js"></script>

        <script src="\public\assets\libs\jszip\jszip.min.js"></script>
        <script src="\public\assets\libs\pdfmake\pdfmake.min.js"></script>
        <script src="\public\assets\libs\pdfmake\vfs_fonts.js"></script>

        <script src="\public\assets\libs\datatables\buttons.html5.min.js"></script>
        <script src="\public\assets\libs\datatables\buttons.print.min.js"></script>

        <script src="\public\assets\libs\datatables\dataTables.keyTable.min.js"></script>
        <script src="\public\assets\libs\datatables\dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="\public\assets\js\pages\datatables.init.js"></script>

        @yield('js')
        
    </body>
</html>