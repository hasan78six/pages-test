<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("img/apple-icon.png") }}">
    <link rel="icon" type="image/png" href="{{ asset("img/favicon.png") }}">
    <title>
        Test | Hasan Jack
    </title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>

    <!-- Nucleo Icons -->
    <link href="{{ asset("css/nucleo-icons.css") }}" rel="stylesheet"/>
    <link href="{{ asset("css/nucleo-svg.css") }}" rel="stylesheet"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset("css/argon-dashboard.css?v=2.0.4") }}" rel="stylesheet"/>
</head>

<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if(\Illuminate\Support\Facades\Request::segment(1) == 'admin')
                    <div id="app">

                    </div>
                 @else
                    @yield("content")
                @endif

            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Developed By Hasan Abbas
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>

<!--   Core JS Files   -->
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{url('js/app.js')}}"></script>

<!--begin::Page Scripts(used by this page)-->
@stack("pages-scripts")
<!--end::Page Scripts-->
{{--<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>--}}
{{--<script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>--}}
{{--<script>--}}
{{--    var win = navigator.platform.indexOf('Win') > -1;--}}
{{--    if (win && document.querySelector('#sidenav-scrollbar')) {--}}
{{--        var options = {--}}
{{--            damping: '0.5'--}}
{{--        }--}}
{{--        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);--}}
{{--    }--}}
{{--</script>--}}
<!-- Github buttons -->
{{--<script async defer src="https://buttons.github.io/buttons.js"></script>--}}
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->

{{--<script src="{{asset('js/argon-dashboard.min.js?v=2.0.4')}}"></script>--}}
</body>

</html>
