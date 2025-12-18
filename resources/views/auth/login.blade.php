@extends('app')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">
        <div class="w-full px-6 py-8 mx-auto sm:max-w-md">
            <a href="#" class="flex items-center justify-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-32 h-32 mr-2" src="{{ asset('img/student.png') }}" alt="student-logo">
            </a>

            <div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login.post') }}">
                        @csrf

                        @session('error')
                            <div class="mt-1 text-sm text-red-600" role="alert">
                                {{ $value }}
                            </div>
                        @endsession
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Your email
                            </label>
                            <input type="email" name="email" id="email"
                                class="w-full p-2.5 rounded-lg border bg-gray-50 dark:bg-gray-700 dark:text-white @error('email') border-red-500 @enderror"
                                placeholder="name@student.com" value="{{ old('email') }}">

                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password
                            </label>
                            <input type="password" name="password" id="password"
                                class="w-full p-2.5 rounded-lg border bg-gray-50 dark:bg-gray-700 dark:text-white @error('password') border-red-500 @enderror"
                                placeholder="••••••••">

                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-[#ff8000] rounded-lg px-5 py-2.5 cursor-pointer">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection