@extends('layout.index')
@section('tittle')
    HomePage
@endsection
@section('home_content')
    <main class="flex items-center h-[74%] justify-center p-6">
        <section class="bg-white p-10 rounded-2xl shadow-xl text-center max-w-xl">
            <h1 class="text-5xl font-extrabold text-blue-600 mb-6">Welcome Home</h1>

            <h2 class="text-2xl font-semibold text-gray-800 mb-4">KhmerMart24</h2>

            <p class="text-gray-600 mb-6">
                KhmerMart24 is your trusted online marketplace in Cambodia,
                offering a wide range of products with fast delivery and affordable prices.
            </p>

            <blockquote class="italic text-gray-500 border-l-4 border-blue-500 pl-4 mb-6">
                "Shopping made simple, anytime, anywhere."
            </blockquote>

            <a href="{{ route('about') }}"
                class="px-6 py-3 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 transition">
                Learn More About Us
            </a>
        </section>
    </main>
@endsection
