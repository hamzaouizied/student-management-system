<div class="md:hidden">

    <!-- Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <!-- Sidebar -->
    <aside id="mobile-sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-gray-800 z-50 transform -translate-x-full transition-transform duration-300">

        <div class="h-16 flex items-center justify-between bg-gray-900 px-4">
            <span class="text-white text-lg font-bold">Admin</span>
            <button id="close-mobile-menu" class="text-white text-xl">&times;</button>
        </div>

        <nav class="px-3 py-4 space-y-2">
            <a href="#" class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-gauge w-6"></i>
                <span class="ml-3">Dashboard</span>
            </a>

            <a href="#" class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-users w-6"></i>
                <span class="ml-3">Users</span>
            </a>

            <a href="#" class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-user w-6"></i>
                <span class="ml-3">Profile</span>
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="#">
                @csrf
                <button class="w-full flex items-center px-3 py-2 text-gray-300 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span class="ml-2">Logout</span>
                </button>
            </form>
        </div>
    </aside>
</div>