@extends('DashboardUser.main')

@section('title', 'Piagam')

@section('content')

<div class="p-4 md:max-w-3xl mx-auto min-h-screen">
    <!-- Tab Navigation -->
    <div class="text-sm mb-5 font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="tab-nav">
            <li class="me-2">
                <a href="#" data-target="medali" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                    <i class="fa-solid fa-medal me-2"></i>
                    Medali
                </a>
            </li>
            <li class="me-2">
                <a href="#" data-target="certificate" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                    <i class="fa-solid fa-certificate me-2"></i>
                    Certificate
                </a>
            </li>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content bg-white min-h-96 overflow-y-hidden shadow-md rounded-lg p-6 hidden" id="medali">
        <h2 class="text-sm font-semibold text-gray-800 mb-4">Medali yang Diperoleh</h2>
        @if ($user->achievements->isNotEmpty())
            <ol class="relative border-s border-gray-200 dark:border-gray-700 bg-slate-50">
                @foreach ($user->achievements as $achievement)
                    <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Z" />
                            </svg>
                        </span>
                        <h3 class="flex items-center mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                            {{ $achievement->deskripsi }}
                            <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ms-3
                                {{ $achievement->medal->type == 'gold' ? 'bg-yellow-400 text-white' : '' }}
                                {{ $achievement->medal->type == 'silver' ? 'bg-gray-400 text-white' : '' }}
                                {{ $achievement->medal->type == 'bronze' ? 'bg-orange-900 text-white' : '' }}">
                                {{ ucfirst($achievement->medal->type) }}
                            </span>
                        </h3>
                        <time class="block mb-2 text-xs text-gray-400 dark:text-gray-500">
                            {{ \Carbon\Carbon::parse($achievement->achieved_at)->format('d M Y') }}
                        </time>
                        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                            {{ $achievement->deskripsi ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </li>
                @endforeach
            </ol>
        @else
            <p class="text-gray-500">Belum memiliki medali.</p>
        @endif
    </div>

    <div class="tab-content bg-white min-h-96 overflow-y-hidden shadow-md rounded-lg p-6 hidden" id="certificate">
        <h2 class="text-sm font-semibold text-gray-800 mb-4">Certificate yang Diperoleh</h2>
        <img src="{{ asset('img/soon.png') }}" class=" mx-auto" alt="">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".tab-link");
        const contents = document.querySelectorAll(".tab-content");

        // Function to handle tab switching
        const switchTab = (targetId) => {
            contents.forEach((content) => {
                if (content.id === targetId) {
                    content.classList.remove("hidden");
                    content.classList.add("opacity-0");
                    setTimeout(() => {
                        content.classList.add("opacity-100");
                        content.classList.remove("opacity-0");
                    }, 10);
                } else {
                    content.classList.add("hidden");
                    content.classList.remove("opacity-100");
                }
            });

            tabs.forEach((tab) => {
                const isActive = tab.dataset.target === targetId;
                tab.classList.toggle("text-blue-600", isActive);
                tab.classList.toggle("border-blue-600", isActive); // Adds the border-bottom color for the active tab
                tab.classList.toggle("dark:text-blue-500", isActive);
                tab.classList.toggle("dark:border-blue-500", isActive);
                tab.classList.toggle("font-bold", isActive); // Optional: make active tab font bold
            });
        };

        // Add click event listeners
        tabs.forEach((tab) => {
            tab.addEventListener("click", (event) => {
                event.preventDefault();
                const targetId = tab.dataset.target;
                switchTab(targetId);
            });
        });

        // Set default active tab
        const defaultTab = tabs[0].dataset.target;
        switchTab(defaultTab);
    });
</script>

@endsection
