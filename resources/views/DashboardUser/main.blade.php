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

    <body class="bg-gray-50 font-inter">


        <!-- Main Content -->
        <main class="container mx-auto px-4 py-10 font-inter">
            <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
                aria-controls="sidebar-multi-level-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>

            <aside id="sidebar-multi-level-sidebar"
                class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-red-900 dark:bg-gray-800 font-inter">
                    <h1 class="  text-center font-bold text-white mb-10 text-xl">Erasta Logo</h1>
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-slate-200 rounded-lg dark:text-slate-200 hover:bg-gray-500 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-house"></i>


                                <span class="ms-3 text-sm">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-slate-200 transition duration-75 rounded-lg group hover:bg-gray-500 dark:text-slate-200 dark:hover:bg-gray-700"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="flex-1 ms-3 text-sm text-left rtl:text-right whitespace-nowrap">My
                                    Activity</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-2 text-slate-200 transition duration-75 rounded-lg pl-11 group hover:bg-gray-500 dark:text-slate-200 dark:hover:bg-gray-700 text-sm"><i
                                            class="fa-regular fa-calendar-days mr-2"></i>Weekly
                                        Activity</a>
                                </li>
                                <li>

                                    <a href="#"
                                        class="flex items-center w-full p-2 text-slate-200 transition duration-75 rounded-lg pl-11 group hover:bg-gray-500 dark:text-slate-200 dark:hover:bg-gray-700 text-sm">
                                        <i class="fa-solid fa-book mr-2"></i>My
                                        Journey</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-slate-200 transition duration-75 rounded-lg group hover:bg-gray-500 dark:text-slate-200 dark:hover:bg-gray-700"
                                aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
                                <i class="fa-solid fa-trophy"></i>
                                <span class="flex-1 ms-3 text-sm text-left rtl:text-right whitespace-nowrap">My
                                    Achievement</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example1" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-2 text-slate-200 transition duration-75 rounded-lg pl-11 group hover:bg-gray-500 dark:text-slate-200 dark:hover:bg-gray-700 text-sm"><i
                                            class="fa-solid fa-medal mr-2"></i>Medals</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-2 text-slate-200 transition duration-75 rounded-lg pl-11 group hover:bg-gray-500 dark:text-slate-200 dark:hover:bg-gray-700 text-sm"><i
                                            class="fa-solid fa-certificate mr-2"></i>
                                        Certificate</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-slate-200 rounded-lg dark:text-slate-200 hover:bg-gray-500 dark:hover:bg-gray-700 group">
                                <i class="fa-regular fa-calendar"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">My Schedule</span>
                                <span
                                    class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-slate-200 rounded-lg dark:text-slate-200 hover:bg-gray-500 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="flex-1 ms-3 text-sm font-bold whitespace-nowrap">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            @yield('content')
        </main>


        <!-- Scripts -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    </body>

</html>
