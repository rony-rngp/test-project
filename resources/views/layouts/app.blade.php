
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>@yield('title') | User Crud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <!-- Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <style type="text/css">
        body{
            margin-top:20px;
            background:#f8f8f8
        }
    </style>

    @stack('css')
</head>
<body>
<div class="container">
    <div class="row flex-lg-nowrap">

        @include('layouts.partial.left_sidebar')

        <div class="col">
            <div class="e-tabs mb-3 px-3">
                <ul class="nav nav-tabs">
                    @if(Request::is('/'))
                    <li class="nav-item"><a class="nav-link active" href="#">Users</a></li>
                    @endif

                    @if(Request::is('profile*'))
                        <li class="nav-item"><a class="nav-link active" href="#">Profile</a></li>
                    @endif
                </ul>
            </div>

            <div class="row flex-lg-nowrap">

                @yield('content')


                @include('layouts.partial.right_sidebar')

            </div>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')

<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script>
    $("#Txt_Date").datepicker({
        format: 'yyyy-mm-dd',
        inline: false,
        lang: 'en',
        step: 2,
        multidate: 2,
        closeOnDateSelect: true
    });
</script>
@stack('js')
</body>
</html>
