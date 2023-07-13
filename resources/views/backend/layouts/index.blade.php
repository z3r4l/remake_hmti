<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    {{-- <meta name="robots" content="noindex, nofollow"> --}}
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image" sizes="16x16" href="{{ asset('backend/img/logoHMTI.svg') }}">

    <!-- Custom Stylesheet -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Script Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     {{-- DatePicker --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body>
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo"><a href="/"><b><img src="{{ asset('backend/img/logoHMTI.svg') }}" width="50" height="50" alt=""> </b><span class="brand-title text-white font-weight-bold">HMTI Ibnu Sina</span></a>
            </div>
            <div class="nav-control">
                <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
            <x-backend.navbar/>
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
            <x-backend.sidebar/>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4 class="text-capitalize">{{ $page }}</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-capitalize">{{ $page }}</li>
                        </ol>
                    </div>
                </div>
                {{ $slot }}
               
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
            <x-backend.footer/>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('backend/assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/mycustom.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/gleek.js') }}"></script>
    <script src="{{ asset('backend/js/styleSwitcher.js') }}"></script>

    {{-- <script src="{{ asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/plugins-init/datatables.init.js') }}"></script> --}}
     {{-- Datatables --}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">    
     </script> <!-- MAKE SURE THIS IS LOADED -->
    
    <link 
      rel="stylesheet" 
      type="text/css" 
      href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
      
    <script 
      type="text/javascript" 
      charset="utf8" 
      src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
      </script>

    {{-- Text Editor --}}
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init/editor-tinymice-init.js') }}"></script>
    
    {{-- chart --}}
    <script src="{{ asset('backend/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/dashboard/dashboard-7.js') }} "></script>

   
    {{-- Sweet Alert --}}
      @include('sweetalert::alert')
</body>  
</html>