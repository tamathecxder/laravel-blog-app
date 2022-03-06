<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets') }}/adminkit/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />


    <title>Blog App Dashboard | @yield('title')</title>

    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('assets') }}/adminkit/css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    {{-- Trix Editor WYSIWYG --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/css/trix/trix.css">
    <script src="{{ asset('assets') }}/js/trix/trix-core.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('partials.dashboard.sidebar')

        <div class="main">
            @include('partials.dashboard.navbar')

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            @include('partials.dashboard.footer')
        </div>
    </div>

    {{-- bootstrap 5 js
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}


    <script src="{{ asset('assets') }}/adminkit/js/app.js"></script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('assets') }}/js/sweetalert2/sweetalert2.all.min.js"></script>

    {{-- jquery --}}
    <script src="{{ asset('assets') }}/js/jquery/jquery-3.6.0.min.js"></script>


    {{-- stacked script --}}
    @stack('script')

</body>

</html>
