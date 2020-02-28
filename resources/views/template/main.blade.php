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
    <div class="conteint-main container">
      @yield('content')
    </div>
    @include('components.footer')
    @include('template.global-js')
    @stack('js')
</body>
</html>
