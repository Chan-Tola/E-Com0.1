<!DOCTYPE html>
<html lang="en" x-data="themeStore()" :class="{ 'dark': dark }" x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('tittle')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Boxicons CSS -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>

<body class="h-screen">


    <nav>
        @include('components.sidebar')
    </nav>
    @include('components.navbar')


    <section class="sm:ml-64 dark:bg-[#232325">
        @yield('dashboard_content')
        @yield('listings_content')
    </section>

    @include('components.alert')

    {{-- note: jQuery at the bottom --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- note: Include SweetAlert2 CSS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('asset/js/modal-alert.js') }}"></script>

    {{-- note: flowbit Scipt --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- Dynamic Modal Component -->
</body>

</html>
