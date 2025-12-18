<aside class="hidden md:flex md:flex-col w-64 dark:bg-gray-900">
    <div class="h-16 flex items-center justify-center bg-gray-900">
        <span class="text-white text-xl font-bold">
            <img class="w-16 h-16 mr-2" src="{{ asset('img/student.png') }}" alt="student-logo">
        </span>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-2">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white
                                                                        {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white' : '' }}">
            <i class="fas fa-gauge w-6"></i>
            <span class="ml-3">Dashboard</span>
        </a>
        <a href="{{ route('students.index') }}"
            class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
            <i class="fas fa-users w-6"></i>
            <span class="ml-3 text-[#ff8000] font-semibold">Students</span>
        </a>

        <a href="{{ route('courses.index') }}"
            class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
            <i class="fa-solid fa-book"></i>
            <span class="ml-3 text-[#ff8000] font-semibold">Courses</span>
        </a>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <p class="text-sm text-white">{{ Auth::user()->name }}</p>
        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>

        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button
                class="w-full flex items-center px-3 py-2 text-gray-300 hover:bg-gray-700 rounded-lg cursor-pointer">
                <i class="fas fa-sign-out-alt w-5"></i>
                <span class="ml-2">Logout</span>
            </button>
        </form>
    </div>
</aside>