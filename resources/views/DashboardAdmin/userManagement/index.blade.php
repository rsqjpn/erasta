@extends('DashboardAdmin.layout')

@section('title', 'dashboard')

@section('content')

    <div class="p-4 sm:ml-64">
        <div class=" flex justify-center gap-4">


            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-8 rounded-t-lg" src="{{ asset('img/logo1.png') }}" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Welcome Admin , <strong>{{ $user->username }}</strong></h5>
                    </a>
                   
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                        <a href="#"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            to cart</a>
                    </div>
                </div>
            </div>



            <div class="container mx-auto">
                <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
                    <div class="flex justify-between items-center">
                        <h2 class="text-sm font-semibold text-gray-700">User by Role</h2>
                        <div class="relative">

                        </div>
                    </div>
                    <div id="userRoleChart" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [{{ $adminCount }}, {{ $userCount }}, {{ $otherCount }}],
                chart: {
                    type: 'donut',
                    height: 300
                },
                labels: ['Admin', 'Anggota', 'Pelatih'],
                colors: ['#1E90FF', '#00C49F', '#FFBB28'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 280
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#userRoleChart"), options);
            chart.render();
        });
    </script>


@endsection
