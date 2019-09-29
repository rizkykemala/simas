
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Masjid</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('source/images/favlogo2.png') }}">
    
    <!-- Switcher CSS -->
    <link rel="stylesheet" href="{{ asset('source/assets/plugin/switchery/switchery.min.css') }}" />
    <!-- Pick A Date CSS -->
    <link rel="stylesheet" href="{{ asset ('source/assets/plugin/pickadate/default.css') }}" />
    <link rel="stylesheet" href="{{ asset ('source/assets/plugin/pickadate/default.date.css') }}" />
    <link rel="stylesheet" href="{{ asset ('source/assets/plugin/pickadate/default.time.css') }}" />
    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset ('source/assets/plugin/daterangepicker/daterangepicker.css') }}" />
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="{{ asset('source/assets/plugin/sweetalert/sweetalert.css') }}" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('source/dist/css/style.css') }}" />

</head>
<body>

    <div class="loader-wrapper">
        <div class="loader spinner-3">
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
        </div>
    </div>
    
    <div class="wrapper">
        <!-- Main Container -->
        <div id="main-wrapper" class="menu-fixed page-hdr-fixed page-ftr-fixed">
            <!-- Menu Wrapper -->

            @include('sidebar')

            <!-- Page header -->
            
            @include('header')

            <!-- Main Page Wrapper -->
            <div class="page-wrapper">

                <!-- Page Title -->
                @include('subheader')

                <!-- Page Body -->

                @yield('pages')
                
            </div>
            <!-- Page Footer -->
            <div class="page-ftr">
                <div>© 2019. Rizky Kemala</div>
            </div>
        </div>
        <!-- Sidebar Section -->
        <!-- End Sidebar Section -->
    </div>


    <!-- Include js files -->

    <!-- Vendor Plugin -->
    <script type="text/javascript" src="{{ asset("source/assets/plugin/vendor.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset("source/assets/plugin/pickadate/picker.js") }}"></script>
    <script type="text/javascript" src="{{ asset("source/assets/plugin/pickadate/picker.date.js") }}"></script>
    <script type="text/javascript" src="{{ asset("source/assets/plugin/pickadate/picker.time.js") }}"></script>
    <script type="text/javascript" src="{{ asset("source/assets/plugin/pickadate/legacy.js") }}"></script>
    <script type="text/javascript" src="{{ asset("source/assets/plugin/sweetalert/sweetalert.js") }} "></script>
    <!-- Custom Script Plugin -->
    <script type="text/javascript" src="{{ asset("source/dist/js/custom.js") }}"></script>
    @stack('script')
</body>
</html>