<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    {{-- Global CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Page-specific CSS --}}
    @yield('css')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
     <div class="app-wrapper">

         {{-- Navigation Navigation --}}
        @include('layouts.navigation')

        {{-- Sidebar Navigation --}}
        @include('layouts.sidebar')

        {{-- Main Content Area --}}
         <main class="app-main">
            @yield('content')
        </main>       

        {{-- Footer --}}
        @include('layouts.footer')
    </div>

    {{-- Global Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Page-specific Scripts --}}
    @yield('scripts')
</body>
</html>
