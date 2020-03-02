<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'ExPI')</title>

    @include('template.global-css')
    @stack('css')
</head>
<body>
<div>
    @include('components.nabvar')
</div>
<div class="row m-0 h-100">
    @auth
        <div class="col-2 bg-dark d-none d-md-block">
            @include('components.siderbar')
        </div>
    @endauth
    <div class="col ">
        <div class="conteint-main container h-100">
            @yield('content')
        </div>
    </div>
</div>
@include('components.footer')
@include('template.global-js')
@stack('scripts')
</body>
</html>
