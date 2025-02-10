<!doctype html>
<html class="scroll-smooth">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>@yield('title', 'Erasta')</title>

        @vite('resources/css/app.css')
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Flowbite -->
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

        <!-- AOS (Animate On Scroll) -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        {{-- sweet alert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class=" font-inter bg-white">
        <!-- Navbar -->
        <nav id="navbar"
            class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 py-2 bg-white border-b-2 border-slate-200 transition-all duration-300"
            aria-label="Global">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="text-lg font-bold text-slate-700">Logo Erasta</a>
            </div>

            <!-- Profile & Mobile Menu Toggle -->
            <div class="flex items-center space-x-4">
                <!-- Profile Dropdown -->
                <div class="relative">
                    <button id="dropdownNavbarLink" class="flex items-center text-slate-500 focus:outline-none">
                        <div class="relative">
                            <img class="w-8 h-8 rounded-full object-cover border border-gray-300"
                                src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg"
                                alt="Profile">

                        </div>
                        <i class="fa-solid fa-chevron-down px-1"></i>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="hidden absolute right-0 mt-2 w-44 bg-white divide-y divide-gray-200 rounded-lg shadow-lg">
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>





        <!-- Floating Button -->
        <div class="fixed bottom-6 right-6 z-50">
            <!-- Toggle Button -->
            <button id="floatingToggle"
                class="p-2 bg-sec-0 rounded-full shadow-lg text-white  focus:outline-none transition-transform">
                <!-- Default Arrow Down -->
                <svg id="arrowDown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                <!-- Arrow Up (Hidden by Default) -->
                <svg id="arrowUp" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-6 h-6 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                </svg>
            </button>

            <!-- Floating Navigation Panel -->
            <div id="floatingPanel"
                class="hidden fixed bottom-16 right-2 w-fit p-4 bg-none bg-opacity-70 bg-slate-200 rounded-md animate-fade-in">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('user.dashboard') }}"
                            class="items-center border border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                            <div class="flex items-center">
                                <i class="fa-solid fa-home bg-slate-400 rounded-md text-white text-md p-3"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="items-center border border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                            <div class="flex items-center">
                                <i
                                    class="fa-regular fa-calendar-days bg-orange-400 rounded-md text-white text-md p-3"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="items-center border border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                            <div class="flex items-center">
                                <i class="fa-regular fa-user bg-sky-400 rounded-md text-white text-md p-3"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="items-center border border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                            <div class="flex items-center">
                                <i class="fa-solid fa-medal bg-teal-400 rounded-md text-white text-md p-3"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

        </div>


 <main class="container mx-auto px-4 py-10 font-inter">
        @yield('content')
    </main>



        <!-- Scripts -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

        <!-- Profile Dropdown Toggle -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdownBtn = document.getElementById('dropdownNavbarLink');
                const dropdownMenu = document.getElementById('dropdownNavbar');

                dropdownBtn.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function(event) {
                    if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const toggleButton = document.getElementById('floatingToggle');
                const floatingPanel = document.getElementById('floatingPanel');
                const arrowDown = document.getElementById('arrowDown');
                const arrowUp = document.getElementById('arrowUp');

                // Toggle panel visibility and arrow direction
                toggleButton.addEventListener('click', function() {
                    floatingPanel.classList.toggle('hidden'); // Show/Hide panel
                    arrowDown.classList.toggle('hidden'); // Hide arrow down
                    arrowUp.classList.toggle('hidden'); // Show arrow up
                });

                // Close panel when clicking outside
                document.addEventListener('click', function(event) {
                    if (!floatingPanel.contains(event.target) && !toggleButton.contains(event.target)) {
                        floatingPanel.classList.add('hidden');
                        arrowDown.classList.remove('hidden'); // Reset to arrow down
                        arrowUp.classList.add('hidden'); // Hide arrow up
                    }
                });
            });
        </script>

    </body>


</html>
