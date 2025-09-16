<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <nav>
        @include('partial.navbar')
    </nav>
    @yield('home_content')
    @yield('about_content')
    @yield('user_content')
    @yield('register_content')
    @yield('login_content')
    <footer>
        @include('partial.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
