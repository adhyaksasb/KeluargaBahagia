<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>KeluargaBahagia | Admin Panel</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{asset('admin/vendors/select2/select2.min.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}"/>
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/js/select.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css') }}">
        <link rel="stylesheet" href="{{asset('admin/css/custom.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('admin/images/KB-Logo.svg') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            @include('admin.layout.header')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                @include('admin.layout.sidebar')
                <!-- partial -->
                @yield('content')
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('admin/js/dataTables.select.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('admin/vendors/select2/select2.min.js')}}"></script>
        <script src="{{asset('admin/js/select2.js')}}"></script>
        <script src="{{asset('admin/js/file-upload.js')}}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('admin/js/template.js')}}"></script>
        <script src="{{asset('admin/js/settings.js')}}"></script>
        <script src="{{asset('admin/js/todolist.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('admin/js/dashboard.js')}}"></script>
        <script src="{{asset('admin/js/Chart.roundedBarCharts.js')}}"></script>
        <script src="{{asset('admin/js/custom.js')}}"></script>
        <!-- End custom js for this page-->
    </body>
</html>