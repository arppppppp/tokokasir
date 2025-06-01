<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(to right, #7f5af0, #5f3dc4); min-height: 100vh;">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-center text-gray-900 dark:text-white">
                    <h1 class="text-3xl font-bold mb-4">Selamat Datang di Dashboard!</h1>
                    <p class="text-lg">Terima kasih telah bergabung. Kelola tokomu dengan mudah dan nikmati berbagai fitur yang tersedia untuk mendukung bisnismu!</p>
                    <img src="{{ asset('images/dashboard-illustration.png') }}" alt="Dashboard Illustration" class="mt-6 w-2/3 mx-auto rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
