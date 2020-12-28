<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$title ?? ""}}</title>

    {{-- <!-- Open Graph Meta -->
    <meta property="og:title" content="Siapfulin">
    <meta property="og:site_name" content="siapfulin">
    <meta property="og:description"
        content="Siapfulin - Marketplace Enabler &amp; Application to ease the user of marketplace">
    <meta property="og:type" content="application">
    <meta property="og:url" content="">
    <meta property="og:image" content=""> --}}

    <!-- Icons -->
    <link rel="shortcut icon" href="{{asset('public/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{asset('public//media/favicons/apple-touch-icon-180x180.png')}}">

    @yield('headerScript')
    <link rel="stylesheet" id="css-main" href="{{asset('public/css/siapfulin.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

</head>

<body>
    @if((!Request::segment(1))||(Request::segment(1)=='forgot')||(Request::segment(1)=='reset')||(Request::segment(1)=='register'))
    <div id="page-container" class="page-header-dark main-content-boxed">
        <main id="main-container">
            @yield('content')
        </main>
    </div>
    @else
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('aside')
        @include('menu')
        @include('header')
        <main id="main-container">
            @if (Request::segment(1)<>'dashboard')
                @include('breadcrumb')
                @endif
                @yield('content')
        </main>
        @include('footer')
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg modal-dialog-fromleft" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
    @endif
    @include('modal')
    <script src="{{asset('public/js/siapfulin.core.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.app.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    @include('notification')
    @yield('footerScript')
</body>

</html>