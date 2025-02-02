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
    </head>

    <body class="bg-gray-50 font-inter">





        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                            <span
                                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        alt="user photo">
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ $user->username }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none">
                                        {{ $user->email }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">


                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen shadow-lg pt-20 transition-transform -translate-x-full bg-slate-200 border-r border-gray-300 sm:translate-x-0 dark:bg-gray-900 dark:border-gray-700"
            aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">

                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center p-2 text-gray-800 rounded-lg
                    {{ Request::routeIs('admin.users.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                            <i class="fas fa-home text-gray-800 dark:text-white"></i>
                            <span class="ms-3 font-bold">Dashboard</span>
                        </a>
                    </li>

                    <!-- User Management -->
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 rounded-lg text-gray-800 dark:text-white
                    hover:bg-gray-300 dark:hover:bg-gray-700"
                            onclick="toggleDropdown('dropdown-users')" data-dropdown="dropdown-users">
                            <i class="fas fa-users text-gray-800 dark:text-white"></i>
                            <span class="mr-2 ms-3 font-bold">User Management</span>
                            <i class="fas fa-chevron-down ml-auto"></i>
                        </button>
                        <ul id="dropdown-users" class="py-2 space-y-2 hidden">
                            <li>
                                <a href="{{ route('anggota') }}"
                                    class="flex font-bold items-center w-full p-2 pl-11 rounded-lg text-gray-800 dark:text-white
                            {{ Request::routeIs('anggota') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                                  <i class="fa-solid fa-users-line mr-2"></i> Data Anggota
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pelatih.index') }}"
                                    class="flex font-bold items-center w-full p-2 pl-11 rounded-lg text-gray-800 dark:text-white
                            {{ Request::routeIs('pelatih.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                                    <i class="fa-solid fa-user-ninja mr-2"></i>Data Pelatih
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- Achievement -->
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 rounded-lg text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700"
                            onclick="toggleDropdown('dropdown-achievement')" data-dropdown="dropdown-achievement">
                            <i class="fas fa-trophy text-gray-800 dark:text-white"></i>
                            <span class="mr-2 ms-3 font-bold">Achievement</span>
                            <i class="fas fa-chevron-down ml-auto"></i>
                        </button>

                        <!-- Perbaikan: Semua dropdown berada dalam satu <ul> -->
                        <ul id="dropdown-achievement" class="py-2 space-y-2 hidden">
                            <li>
                                <a href="{{ route('medals.index') }}"
                                    class="flex font-bold items-center w-full p-2 pl-11 rounded-lg text-gray-800 dark:text-white
                {{ Request::routeIs('medals.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                                    <i class="fa-solid fa-medal mr-2 "></i>Medali
                                </a>
                            </li>
                            <li>
                                <a href=""
                                    class="flex font-bold items-center w-full p-2 pl-11 rounded-lg text-gray-800 dark:text-white
                {{ Request::routeIs('baru.route') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                                    <i class="fa-solid fa-file-lines mr-2"></i>Piagam
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- general --}}
                      <li>
                        <button type="button"
                            class="flex items-center w-full p-2 rounded-lg text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700"
                            onclick="toggleDropdown('dropdown-general')" data-dropdown="dropdown-general">
                            <i class="fas fa-gear text-gray-800 dark:text-white"></i>
                            <span class="mr-2 ms-3 font-bold">General</span>
                            <i class="fas fa-chevron-down ml-auto"></i>
                        </button>

                        <!-- Perbaikan: Semua dropdown berada dalam satu <ul> -->
                        <ul id="dropdown-general" class="py-2 space-y-2 hidden">
                            <li>
                                <a href="{{ route('location.index') }}"
                                    class="flex font-bold items-center w-full p-2 pl-11 rounded-lg text-gray-800 dark:text-white
                {{ Request::routeIs('location.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                                    <i class="fa-solid fa-location-dot mr-2 "></i>Tempat Latihan
                                </a>
                            </li>
                            <li>
                                <a href=""
                                    class="flex font-bold items-center w-full p-2 pl-11 rounded-lg text-gray-800 dark:text-white
                {{ Request::routeIs('baru.route') ? 'bg-blue-600 text-white' : 'hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                                    <i class="fa-regular fa-calendar-days mr-2"></i>Jadwal Latihan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <span class=" w-full block border-b border-slate-400 ">

                    </span>

                    <!-- Sign Out -->
                    <li>
                        <a href="#"
                            class="flex items-center p-2 mt-3 text-gray-800 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-sign-out-alt text-gray-800 dark:text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                        </a>
                    </li>
                    {{-- <span class=" w-full block border-b border-slate-400 "> --}}
                </ul>
                <div class=" absolute b-0 w-full p-2">
                </div>
            </div>
        </aside>




        <div class="p-4 ">
            <!-- Main Content -->
            <main class="container mx-auto px-4 py-10 font-inter">
                @yield('content')
            </main>

        </div>

        <!-- SCRIPT UNTUK MENYIMPAN STATUS DROPDOWN -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Ambil semua tombol dropdown
                const dropdownButtons = document.querySelectorAll("[data-dropdown]");

                dropdownButtons.forEach(button => {
                    let dropdownId = button.getAttribute("data-dropdown");
                    let dropdownMenu = document.getElementById(dropdownId);
                    let isOpen = localStorage.getItem(dropdownId);

                    // Cek apakah dropdown harus dibuka berdasarkan localStorage
                    if (isOpen === "true") {
                        dropdownMenu.classList.remove("hidden");
                    }

                    button.addEventListener("click", function() {
                        // Toggle dropdown
                        dropdownMenu.classList.toggle("hidden");

                        // Simpan status dropdown ke localStorage
                        let status = dropdownMenu.classList.contains("hidden") ? "false" : "true";
                        localStorage.setItem(dropdownId, status);
                    });
                });
            });
        </script>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>

</html>
