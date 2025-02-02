@extends('layouts')

@section('title', 'Home - Erasta')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md">
        <!-- Stepper -->
        <ol
            class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base mb-6">
            <li
                class="stepper-step flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700 active">
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    Personal <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                </span>
            </li>
            <li
                class="stepper-step flex md:w-full items-center after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    <span class="me-2">2</span>
                    Account <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                </span>
            </li>
            <li class="stepper-step flex items-center">
                <span class="me-2">3</span>
                Confirmation
            </li>
        </ol>

        <!-- Form -->
        <form>
            <!-- Step 1: Personal Info -->
            <div class="step active">
                <div class="relative mb-5">
                    <input type="text" id="floating_outlined"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nama
                        Lengkap</label>
                </div>
                <div class="relative mb-5">
                    <input type="text" id="floating_outlined1"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined1"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nama
                        Panggilan
                    </label>
                </div>
                <div class="relative mb-5">
                    <input type="number" id="floating_outlined1"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined1"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">No
                        Telp/WA
                    </label>
                </div>
                <div class="relative mb-5">
                    <input type="text" id="floating_outlined1"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined1"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Alamat
                    </label>
                </div>


            </div>

            <!-- Step 2: Account Info -->
            <div class="step hidden">

                <form class="max-w-sm mx-auto">
                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilihan kelas</label>
                    <select id="kelas"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Kelas</option>
                        <option value="US">Kelas Reguler</option>
                        <option value="CA">Kelas Atlet</option>
                        <option value="FR">Kelas Privat</option>
                    </select>
                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilihan Lokasi Latihan</label>
                    <select id="lokasi"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Lokasi</option>
                        <option value="US">Kelas Reguler</option>
                        <option value="CA">Kelas Atlet</option>
                        <option value="FR">Kelas Privat</option>
                    </select>
                </form>

            </div>

            <!-- Step 3: Confirmation -->
            <div class="step hidden">
                <p class="text-center text-lg font-semibold text-gray-700">Review your information before submitting.</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between mt-6">
                <button type="button" class="prev hidden px-4 py-2 bg-gray-400 text-white rounded">Previous</button>
                <button type="button" class="next px-6 py-2 bg-blue-600 text-white rounded">Next <i
                        class="fa-solid fa-arrow-right ml-2"></i></button>
                <button type="submit" class="submit hidden px-4 py-2 bg-green-600 text-white rounded">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentStep = 0;
            const steps = document.querySelectorAll(".step");
            const stepperSteps = document.querySelectorAll(".stepper-step");
            const nextBtn = document.querySelector(".next");
            const prevBtn = document.querySelector(".prev");
            const submitBtn = document.querySelector(".submit");

            function updateSteps() {
                steps.forEach((step, index) => {
                    step.classList.toggle("hidden", index !== currentStep);
                });

                stepperSteps.forEach((step, index) => {
                    step.classList.toggle("text-blue-600", index <= currentStep);
                    step.classList.toggle("text-gray-400", index > currentStep);
                });

                prevBtn.classList.toggle("hidden", currentStep === 0);
                nextBtn.classList.toggle("hidden", currentStep === steps.length - 1);
                submitBtn.classList.toggle("hidden", currentStep !== steps.length - 1);
            }

            nextBtn.addEventListener("click", () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    updateSteps();
                }
            });

            prevBtn.addEventListener("click", () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateSteps();
                }
            });

            updateSteps();
        });
    </script>

@endsection
