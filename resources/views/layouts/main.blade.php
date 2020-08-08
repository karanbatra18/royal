<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    @include('_partials.main.head')
</head>
<body>
<div id="app">
    @include('_partials.main.header')

    <main role="main">
        @yield('content')
    </main>

    @include('_partials.main.footer')
</div>

</body>
</html>
