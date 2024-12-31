<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="expires" content="0"> --}}
    <title>PPTC - Dashboard </title>


    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 Admin Dashboard built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/">


    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" --}}
        {{-- href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" /> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/pickr/pickr-themes.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/pages/app-calendar.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/swiper/swiper.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/sweetalert2/sweetalert2.css" />


    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/spinkit/spinkit.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom/style.css" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    {{-- <script src="{{ asset('assets') }}/vendor/js/template-customizer.js"></script> --}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets') }}/js/default/config.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>
       <!-- Flat Picker -->
       <script src="{{ asset('assets') }}/vendor/libs/moment/moment.js"></script>
       <script src="{{ asset('assets') }}/vendor/libs/flatpickr/flatpickr.js"></script>

    <script src="{{ asset('assets') }}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/toastr/toastr.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
     <script src="{{ asset('assets') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
     <script src="{{ asset('assets') }}/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
     <script src="{{ asset('assets') }}/vendor/libs/pickr/pickr.js"></script>
     <script src="{{ asset('assets') }}/vendor/libs/dropzone/dropzone.js"></script>
     <script src="{{ asset('assets') }}/vendor/libs/bs-stepper/bs-stepper.js"></script>
     <script src="{{ asset('assets') }}/vendor/libs/tagify/tagify.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/bloodhound/bloodhound.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <script src="{{ asset('assets') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="{{ asset('assets') }}/js/custom/ajaxsetup.js"></script>

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

                <div class="app-brand demo ">
                    <a href="{{url('/')}}" class="app-brand-link">

                        <span class="app-brand-text demo menu-text fw-bold ms-2 text-uppercase ">Emp Panel</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>



                <ul class="menu-inner py-1">

                    @php
                        $pptcEmployee = session()->get('pptcEmployee');
                       // pre($pptcEmployee['emp_type']);exit;
                        $roleId = $pptcEmployee['roleId'];
                        $name = $pptcEmployee['employeeName'];
                        $role = $pptcEmployee['role'];

                    @endphp
                    {!! getTopNavCat($roleId) !!}
                </ul>



            </aside>
            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">





                <!-- Navbar -->




                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">



                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">




                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                    <i class="bx bx-search bx-sm"></i>
                                    <span class="d-none d-md-inline-block text-muted">Search </span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->





                        <ul class="navbar-nav flex-row align-items-center ms-auto">


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets') }}/img/img_avatar.png" alt
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets') }}/img/img_avatar.png" alt
                                                            class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ $name }}</span>
                                                    <small class="text-muted">{{ $role }}-{{ $pptcEmployee['empCode'] }}</small>
                                                    <span class="fw-medium d-block">
                                                        @php
                                                            if($pptcEmployee['emp_type']=="INITIATOR" || $pptcEmployee['emp_type']=="MANAGER"){
                                                                echo $pptcEmployee['emp_type'];
                                                            }
                                                        @endphp
                                                       </span> 
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li> --}}

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('logout') }}" >
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->


                        </ul>
                    </div>


                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper  d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search...">
                        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>


                </nav>



                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">

                      <!-- Toast with Animation -->
                      <div class="bs-toast toast toast-success toast-ex animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                        <div class="toast-header">
                        {{-- <i class='bx bx-bell me-2'></i>
                        <div class="me-auto fw-medium">Bootstrap</div>
                        <small>11 mins ago</small> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body d-inline-flex " id="toast_body_content">

                        </div>
                    </div>
                    <!--/ Toast with Animation -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        {!! $bodyView !!}

                        <x-admin.modal-layout id="commonModal" title="Add" dialogclass="modal-lg modal-dialog-centered" bodyclass="an-box-shadow">

                        </x-admin.modal-layout>

                        <div class="modal fade" id="excel_error" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header p-3 bg-gradient-dark">
                                    <h5 class="modal-title fa-1x p-1" style="color: #ffffff;" id="header_title">
                                        Error <i class="fas fa-exclamation-triangle"></i></h5>
                                </div>

                                <div class="modal-body" id="errBodyContent"></div>
                                <center>
                                    <h5 class="ml-5" style="color: red; font-size: 14px">Note: Some fields are
                                        missing, contain duplicate
                                        entries, or have an invalid data format.</h5>
                                </center>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" id="closeerrmodal"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                        <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">

                    </div>




                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <div class="drag-target"></div>

    </div>

     <!-- Vendors JS -->
     <script src="{{ asset('assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets') }}/js/default/main.js"></script>
    <script src="{{ asset('assets') }}/js/default/forms-selects.js"></script>
      <!-- Page JS -->
  {{-- <script src="{{ asset('assets') }}//js/app-logistics-dashboard.js"></script> --}}

    <script src="{{ asset('assets') }}/js/custom/common.js"></script>
</body>


</html>


