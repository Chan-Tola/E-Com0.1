@extends('layout.index')
@section('login_content')
    <main class="h-[74%] flex justify-center items-center p-6">
        <div class="h-[32rem] w-[28rem] rounded-2xl bg-white shadow-lg">
            <div class="flex gap-2 p-4">
                <span class="inline-block h-4 w-4 rounded-full bg-blue-500"></span>
                <span class="inline-block h-4 w-4 rounded-full bg-purple-500"></span>
                <span class="inline-block h-4 w-4 rounded-full bg-pink-500"></span>
            </div>
            <div class="card__content p-6">
                <h1 class="text-center text-[2.2em] font-bold text-blue-500">
                    Login Form
                </h1>
                <form class="mx-auto max-w-md" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-800">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="mb-6">
                        <label class="mb-2 block text-base font-medium text-gray-900">Email</label>
                        <input type="email" name="{{ \App\Models\User::EMAIL }}" placeholder="example@gmail.com"
                            class="block w-full rounded-lg border border-gray-300 p-3 text-base" required />
                    </div>

                    <div class="mb-6">
                        <label class="mb-2 block text-base font-medium text-gray-900">Password</label>
                        <input type="password" name="{{ \App\Models\User::PASSWORD }}" placeholder="Password"
                            class="block w-full rounded-lg border border-gray-300 p-3 text-base" required />
                    </div>
                    <button type="submit"
                        class="w-full rounded-lg bg-blue-700 px-6 py-3 text-base font-semibold text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Login
                    </button>
                    <p class="text-center mt-4 text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register.form') }}" class="text-blue-500 hover:underline">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </main>
@endsection
