<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

        {{-- number --}}
        <link rel="stylesheet" href="{{ asset('build/css/demo.css') }}">
        <link rel="stylesheet" href="{{ asset('build/css/intlTelInput.css') }}">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <script src="{{ asset('build/js/intlTelInput.js') }}"></script>
        <script>
            var input = document.querySelector("#phone")
            window.intlTelInput(input,{});
        </script>
        <script>
            function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.querySelector(".toggle-password i");

            if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye"); // Hapus ikon mata
            toggleIcon.classList.add("fa-eye-slash"); // Tambah ikon mata tertutup
            } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash"); // Hapus ikon mata tertutup
            toggleIcon.classList.add("fa-eye"); // Tambah ikon mata
            }
            }
          </script>

    </body>
</html>
