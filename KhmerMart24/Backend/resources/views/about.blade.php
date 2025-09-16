<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - KhmerMart24</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <nav>
        @include('partials.navbar')
    </nav>
    <main class="flex items-center justify-center h-[74%] p-6">
        <section class="bg-white p-10 rounded-2xl shadow-xl max-w-2xl text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-6">About Us</h1>

            <p class="text-gray-700 leading-relaxed mb-4">
                <strong>KhmerMart24</strong> is Cambodia’s modern e-commerce platform built
                to make shopping simple, affordable, and reliable for everyone.
                From daily essentials to lifestyle products, we bring the marketplace
                right to your fingertips, 24/7.
            </p>

            <p class="text-gray-700 leading-relaxed mb-4">
                Our mission is to empower Cambodians with easy access to quality goods
                while supporting local businesses to reach more customers online.
                We believe shopping should be fast, secure, and enjoyable.
            </p>

            <blockquote class="italic text-gray-500 border-l-4 border-blue-500 pl-4 mb-6">
                "Building trust, delivering value, connecting Cambodia."
            </blockquote>

            <a href="{{ route('index') }}"
                class="px-6 py-3 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 transition">
                Back to Home
            </a>
        </section>
    </main>
    <footer>
        @include('partials.footer')
    </footer>
</body>

</html>
