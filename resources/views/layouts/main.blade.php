@extends('app')

@section('content')
    <section>
        <div class="flex h-screen overflow-hidden">
            @include('layouts.desktop-sidebar')
            @include('layouts.mobile-sidebar')

            <div class="flex flex-col flex-1 overflow-hidden">
                <header class="bg-white shadow">
                    <div class="flex items-center justify-between px-4 py-3">

                        <button id="mobile-menu-button" class="md:hidden text-gray-600 text-xl">
                            <i class="fas fa-bars"></i>
                        </button>

                        <h1 class="text-xl font-semibold text-gray-800">
                            @yield('header', 'Dashboard')
                        </h1>

                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center gap-2">
                                <img class="h-8 w-8 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}">
                                <i class="fas fa-chevron-down text-gray-500"></i>
                            </button>

                            <div id="user-menu" class="hidden absolute right-0 mt-2 w-44 bg-white shadow rounded-md z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="flex-1 overflow-y-auto p-4">
                    @yield('main-content')
                </main>
            </div>
        </div>
        <script>
            $(function () {

                $('#mobile-menu-button').on('click', function () {
                    $('#mobile-sidebar').removeClass('-translate-x-full');
                    $('#mobile-overlay').removeClass('hidden');
                    $('body').addClass('overflow-hidden');
                });

                $('#close-mobile-menu, #mobile-overlay').on('click', function () {
                    $('#mobile-sidebar').addClass('-translate-x-full');
                    $('#mobile-overlay').addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                });

                $('#user-menu-button').on('click', function (e) {
                    e.stopPropagation();
                    $('#user-menu').toggleClass('hidden');
                });

                $(document).on('click', function () {
                    $('#user-menu').addClass('hidden');
                });

            });
        </script>
        @stack('scripts')
    </section>

@endsection