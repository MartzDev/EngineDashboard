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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 antialiased">

    @include('layouts.navigation')

    <!-- Page Content -->
    <main class="p-4 sm:ml-64">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="p-4 mb-5 rounded-lg dark:border-gray-700">
                <div class="flex items-center justify-between h-10 ml-5 mr-5 rounded">
                    {{ $header }}
                </div>
            </header>
        @endif
        <div class="p-4 rounded-lg dark:border-gray-700">
            {{ $slot }}
        </div>
    </main>

</body>

</html>
