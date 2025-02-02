<!doctype html>
<html class="scroll-smooth">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>@yield('title', 'Erasta')</title>
        @vite('resources/css/app.css')
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css" rel="stylesheet">
    </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <body>


        <header class="absolute inset-x-0 top-0 z-50">
            <nav id="navbar"
                class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 py-4 bg-red-900 shadow-md transition-all duration-300"
                aria-label="Global">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="text-lg font-bold text-white">Logo Erasta</a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex lg:gap-x-10">
                    <a href="#" class="text-sm font-semibold text-white hover:text-gray-300">Home</a>
                    <a href="#about-us" class="text-sm font-semibold text-white hover:text-gray-300">Tentang Kami</a>
                    <a href="#jadwal" class="text-sm font-semibold text-white hover:text-gray-300">Jadwal</a>
                    <a href="#lokasi" class="text-sm font-semibold text-white hover:text-gray-300">Lokasi</a>
                    <a href="#daftar" class="text-sm font-semibold text-white hover:text-gray-300">Cara Daftar</a>
                </div>

                <!-- Profile & Mobile Menu Toggle -->
                <div class="flex items-center space-x-4">
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="dropdownNavbarLink" class="flex items-center text-white focus:outline-none">
                            <div class="relative">
                                <img class="w-8 h-8 rounded-full"
                                    src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg"
                                    alt="Profile">
                                <span
                                    class="absolute bottom-0 left-5 w-3.5 h-3.5 bg-green-400 border-2 border-white rounded-full"></span>
                            </div>
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="hidden absolute right-0 mt-2 w-44 bg-white divide-y divide-gray-200 rounded-lg shadow-lg">
                            <ul class="py-2 text-sm text-gray-700">
                                @if (Auth::check())
                                    <li><a href="{{ route('profile') }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
                                    <li><a href="{{ route('dashboard') }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2 hover:bg-gray-100">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Login</a></li>
                                    <li><a href="{{ route('register') }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="menu-toggle" type="button" class="lg:hidden text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-16 6h16" />
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="hidden fixed inset-0 z-50 bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="text-lg font-bold text-gray-900">Logo Erasta</a>
                    <button id="menu-close" class="text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-6">
                    <a href="#" class="block py-2 text-gray-900 hover:bg-gray-100">Home</a>
                    <a href="#about-us" class="block py-2 text-gray-900 hover:bg-gray-100">Tentang Kami</a>
                    <a href="#jadwal" class="block py-2 text-gray-900 hover:bg-gray-100">Jadwal</a>
                    <a href="#lokasi" class="block py-2 text-gray-900 hover:bg-gray-100">Lokasi</a>
                    <a href="#daftar" class="block py-2 text-gray-900 hover:bg-gray-100">Cara Daftar</a>
                </div>

                <div class="mt-4">
                    @if (Auth::check())
                        <a href="{{ route('profile') }}"
                            class="block py-2 text-gray-900 hover:bg-gray-100">Profile</a>
                        <a href="{{ route('dashboard') }}"
                            class="block py-2 text-gray-900 hover:bg-gray-100">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left py-2 text-gray-900 hover:bg-gray-100">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block py-2 text-gray-900 hover:bg-gray-100">Login</a>
                        <a href="{{ route('register') }}"
                            class="block py-2 text-gray-900 hover:bg-gray-100">Register</a>
                    @endif
                </div>
            </div>
        </header>

        <div class=" bg-white font-inter">


            <div class="relative isolate ">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#dc2626] to-[#22d3ee] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
                {{-- main --}}
                <main class="w-full h-screen bg-cover bg-center bg-no-repeat bg-fixed relative bg-black "
                    style="background-image: url('{{ asset('img/main.png') }}');">

                    <!-- Overlay untuk meningkatkan keterbacaan -->
                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-5">
                        <h1
                            class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-red-600">
                            Erasta Taekwondo Club
                        </h1>
                        <p class="mt-8 text-lg font-medium text-gray-200 sm:text-xl">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dicta consectetur aspernatur
                            temporibus.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="#daftar"
                                class="rounded-md bg-red-600 px-9 py-3 text-sm font-semibold text-white shadow-md hover:bg-red-500 focus:outline-none">
                                Daftar
                            </a>
                            <a href="#about" class="text-sm font-semibold text-white">
                                Telusuri <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </main>




                {{-- about --}}
                <section id="about-us" class=" rounded-md py-16 mt-4 px-6  sm:px-12 lg:px-20">
                    <!-- Header -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-red-900 sm:text-4xl">Tentang Kami</h2>

                    </div>

                    <!-- Content -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- About Text (2/3) -->
                        <div class="">
                            <h3 class="text-2xl font-semibold text-red-500 mb-4">Apa itu Erasta?</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Erasta Taekwondo Club is a leading martial arts club in Indonesia, committed to
                                nurturing discipline,
                                skill, and character through the art of Taekwondo. Our experienced trainers and
                                structured training
                                programs have produced many champions at local, national, and international levels.
                            </p>
                            <div class="md:flex grid grid-cols-1 lg:grid-cols-2 gap-7 mt-10">
                                <div class="card py-6 px-6 text-center border border-slate-300 rounded-lg mt-2">
                                    <h1 class="counter text-red-800 font-extrabold text-4xl" data-target="122">0</h1>
                                    <p class="font-bold text-sm text-slate-600">Peserta Didik</p>
                                </div>
                                <div class="card py-6 px-6 text-center border border-slate-300 rounded-lg mt-2">
                                    <h1 class="counter text-red-800 font-extrabold text-4xl" data-target="32">0</h1>
                                    <p class="font-bold text-sm text-slate-600">Pelatih Profesional</p>
                                </div>
                                <div class="card py-6 px-6 text-center border border-slate-300 rounded-lg mt-2">
                                    <h1 class="counter text-red-800 font-extrabold text-4xl" data-target="8">0</h1>
                                    <p class="font-bold text-sm text-slate-600">Tempat Latihan</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="https://placehold.co/600x400" class=" w-full" />
                        </div>


                    </div>
                </section>
                <section class=" my-20">
                    <h1 class="my-7 text-red-900 font-bold text-center text-2xl">Pelatih Kami</h1>
                    <div class="flex justify-center">

                        <div id="default-carousel" class="relative w-full md:max-w-xl" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://placehold.co/600x400"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://placehold.co/600x400"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://placehold.co/600x400"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://placehold.co/600x400"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 5 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://placehold.co/600x400"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 5" data-carousel-slide-to="4"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-red-900 dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-red-900 dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </section>



                {{-- schedule --}}
                <section id="jadwal" class=" md:max-w-3xl  flex mx-auto justify-center">
                    <div class="container mx-auto p-4">
                        <h1 class="text-2xl font-bold mb-4 text-center text-red-900">Kalender</h1>
                        <div id="calendar" class="bg-white p-4 rounded shadow"></div>
                    </div>
                </section>


                {{-- lokasi --}}

                <section class="overflow-hidden mt-10" id="lokasi">
                    <h1 class="text-center text-2xl font-bold text-red-900 my-6">Lokasi</h1>
                    <div class=" w-full md:max-w-3xl flex justify-center mx-auto">
                        <div id="controls-carousel" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-72 md:h-96 overflow-hidden rounded-lg">

                                @foreach ($locations as $index => $tempat)
                                    <div class="{{ $index == 0 ? '' : 'hidden' }} duration-700 ease-in-out"
                                        data-carousel-item>
                                        <iframe class="absolute block w-full h-full rounded-lg"
                                            src="{{ $tempat->peta }}" allowfullscreen="" loading="lazy">
                                        </iframe>
                                        <div class="absolute bottom-0 bg-black/80 text-white text-center w-full py-2">
                                            <h3 class="text-lg font-bold">{{ $tempat->nama }}</h3>
                                            <p class="text-xs text-slate-400">{{ $tempat->alamat }}</p>
                                            <p class="text-xs text-slate-500">Jam Operasional: {{ $tempat->jam_buka }}
                                                -
                                                {{ $tempat->jam_tutup }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>


                </section>


                {{-- cara daftar --}}
                <section class="max-w-6xl mx-auto my-20 px-4" id="daftar">
                    <h1 class="text-center text-2xl font-bold text-red-900 mb-8">Pilihan Kelas</h1>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-5 justify-center">
                        <!-- Card 1 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg w-full" src="https://placehold.co/600x400"
                                    alt="Kelas Junior" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Kelas Junior</h5>
                                </a>
                                <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum quos maxime
                                    voluptas?
                                </p>
                                <a href="#"
                                    class="inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none  w-full">
                                    Daftar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg w-full" src="https://placehold.co/600x400"
                                    alt="Kelas Reguler" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Kelas Reguler</h5>
                                </a>
                                <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum quos maxime
                                    voluptas?
                                </p>
                                <a href="#"
                                    class="inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none  w-full">
                                    Daftar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg w-full" src="https://placehold.co/600x400"
                                    alt="Kelas Privat" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Kelas Privat</h5>
                                </a>
                                <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum quos maxime
                                    voluptas?
                                </p>
                                <a href="#"
                                    class="inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none  w-full">
                                    Daftar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>






                @vite('resources/js/calendar.js')





                <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>

            </div>
        </div>
        <footer class=" bg-neutral-50 text-slate-950  dark:bg-gray-900 border border-t-2">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8  bottom-0">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://flowbite.com/" class="flex items-center">
                            <img src="" class="h-8 me-3" alt="" />
                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Erasta</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-slate-500 uppercase dark:text-white">
                                Resources</h2>
                           
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-slate-500 uppercase dark:text-white">
                                Follow us</h2>
                            <ul class="text-slate-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="https://github.com/themesberg/flowbite"
                                        class="hover:underline ">Github</a>
                                </li>
                                <li>
                                    <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-slate-500 uppercase dark:text-white">
                                Legal</h2>
                            <ul class="text-slate-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500 sm:text-center dark:text-gray-400">© 2023 <a href=""
                            class="hover:underline">Erasta™</a>. All Rights
                        Reserved.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-slate-500 hover:text-slate-500 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="#" class="text-slate-500 hover:text-slate-500 dark:hover:text-slate-500 ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 21 16">
                                <path
                                    d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="#" class="text-slate-500 hover:text-slate-500 dark:hover:text-slate-500 ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 17">
                                <path fill-rule="evenodd"
                                    d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Twitter page</span>
                        </a>
                        <a href="#" class="text-slate-500 hover:text-slate-500 dark:hover:text-slate-500 ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">GitHub account</span>
                        </a>
                        <a href="#" class="text-slate-500 hover:text-slate-500 dark:hover:text-slate-500 ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Dribbble account</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>





        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        @vite('resources/js/app.js')

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) {
                    navbar.classList.add('bg-red-900', 'backdrop-blur-md', 'shadow-sm');
                } else {
                    navbar.classList.remove('bg-red-900', 'backdrop-blur-md', 'shadow-sm');
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const counters = document.querySelectorAll(".counter");
                const speed = 100; // Kecepatan animasi (semakin kecil semakin cepat)

                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute("data-target");
                        const count = +counter.innerText;

                        // Hitung pertambahan angka
                        const increment = target / speed;

                        if (count < target) {
                            counter.innerText = Math.ceil(count + increment);
                            setTimeout(updateCount, 20); // Waktu interval untuk smooth effect
                        } else {
                            counter.innerText = target; // Pastikan angka akhir sesuai target
                        }
                    };

                    updateCount();
                });
            });
        </script>
        <!-- Script untuk Dropdown & Mobile Menu -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdownBtn = document.getElementById('dropdownNavbarLink');
                const dropdownMenu = document.getElementById('dropdownNavbar');
                const menuToggle = document.getElementById('menu-toggle');
                const mobileMenu = document.getElementById('mobile-menu');
                const menuClose = document.getElementById('menu-close');

                // Dropdown Profile Toggle
                dropdownBtn.addEventListener('click', function(event) {
                    event.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });

                // Toggle Mobile Menu
                menuToggle.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });

                menuClose.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            });
        </script>


        <script>
            // Ambil elemen tombol dan menu
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            const mobileMenu = document.getElementById('mobile-menu');

            // Event untuk membuka menu
            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            });

            // Event untuk menutup menu
            menuClose.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        </script>

        <script>
            function showMap(index) {
                document.querySelectorAll('.map-container').forEach((el, i) => {
                    el.classList.toggle('hidden', i !== index);
                });
            }
        </script>



    </body>

</html>
