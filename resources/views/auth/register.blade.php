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



    <body class="flex justify-center items-center font-inter bg-gray-100 min-h-screen">

        <main class="w-full max-w-md bg-white rounded-md shadow-lg p-4 md:p-14 mt-5">
            <div class="grid">
                <div>
                    <h1 class="my-5 font-bold text-2xl">Welcome to <strong class=" text-red-900">Erasta</strong></h1>
                </div>
                <form action="{{ route('register') }}" method="POST" onsubmit="return validatePassword()">
                    @csrf
                    <!-- Username -->
                    <div class="relative mb-8">
                        <input type="text" id="username" name="username" placeholder=" "
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('username') }}" required>
                        <label for="username"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 left-3 bg-white px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-blue-600">
                            Username
                        </label>
                    </div>

                    <!-- Email -->
                    <div class="relative mb-8">
                        <input type="email" id="email" name="email" placeholder=" "
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <label for="email"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 left-3 bg-white px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-blue-600"
                            value="{{ old('email') }}" required>
                            Email
                        </label>
                    </div>

                    <!-- Password -->
                    <div class="relative mb-8">
                        <input type="password" id="password" name="password" placeholder=" "
                            class="block px-2.5 pb-2.5 pt-4 pr-10 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <label for="password"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 left-3 bg-white px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-blue-600">
                            Password
                        </label>
                        <!-- Button Show/Hide -->
                        <button type="button" onclick="togglePassword('password', 'eye-icon')"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </button>
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative mb-8">
                        <input type="password" id="confirm-password" placeholder=" " name="password_confirmation"
                            class="block px-2.5 pb-2.5 pt-4 pr-10 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <label for="confirm-password"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 left-3 bg-white px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-blue-600">
                            Confirm Password
                        </label>
                        <!-- Button Show/Hide -->
                        <button type="button" onclick="togglePassword('confirm-password', 'eye-icon-confirm')"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer">
                            <i id="eye-icon-confirm" class="fa-regular fa-eye"></i>
                        </button>
                    </div>

                    <!-- Pesan Validasi Password -->
                    <p id="password-error" class="text-red-600 text-sm mt-2 hidden">Password dan Konfirmasi Password
                        tidak cocok.</p>
                    <!-- Pesan Validasi Password -->
                    @if ($errors->any())
                        <div class="text-red-500 text-sm mb-4">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="flex items-center mb-3">
                        <button type="submit"
                            class="text-sm font-bold px-4 py-2 w-full text-white rounded-md bg-red-900">
                            Register
                        </button>
                    </div>


                    <div class="inline-flex items-center justify-center w-full">
                        <hr class="w-64 h-px my-8 bg-gray-400 border-0">
                        <span
                            class="absolute px-3 font-medium text-xs text-gray-600 -translate-x-1/2 bg-white left-1/2">or</span>
                    </div>

                    <!-- Google Sign-In -->
                    <div class="flex items-center">
                        <button
                            class="flex items-center justify-center text-xs font-bold px-4 py-2 mx-auto text-slate-600 border border-gray-200 rounded-xl ">
                            <svg width="20px" class="mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path fill="#fbc02d"
                                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                                </path>
                            </svg>
                            Continue with Google
                        </button>
                    </div>

                    <div class="flex justify-center my-5">
                        <a href="/login" class="mx-auto text-center text-xs text-slate-500">
                            Sudah punya akun? <span class="text-sky-500">Login</span>
                        </a>
                    </div>

                </form>
            </div>
        </main>



        <script>
            function togglePassword(inputId, iconId) {
                let input = document.getElementById(inputId);
                let icon = document.getElementById(iconId);

                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        </script>

    </body>

</html>
