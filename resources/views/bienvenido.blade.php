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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        {{ __('Log in') }}
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            {{ __('Register') }}
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img class="max-h-12" src="{{ asset('assets/svgs/laravel.svg') }}" alt="Laravel"></a>
            </div>

            <section>
                <div class="relative items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
                    <div class="w-full mx-auto text-left">
                        <div class="relative flex-col items-center m-auto align-middle">
                            <div class="items-center gap-12 text-left lg:gap-24 lg:inline-flex">

                                <div class="order-first block w-full mt-12 lg:mt-0 shadow-2xl">
                                    <img class="object-cover object-center w-full mx-auto bg-gray-300 border divide-dashed rounded-3xl lg:ml-auto"
                                        alt="presentacion" src="{{ asset('assets/svgs/dashboard.svg') }}">
                                </div>

                                <div class="flex flex-col mt-6 lg:mt-0">
                                    <div class="max-w-xl">
                                        <div>
                                            <p class="text-2xl font-medium tracking-tight text-black sm:text-4xl">
                                                {{ 'EngineDashboard' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mx-auto mt-6 lg:max-w-7xl">
                                        <ul role="list"
                                            class="grid grid-cols-2 gap-4 list-none lg:grid-cols-1 lg:gap-3">
                                            <li>
                                                <div>
                                                    <p class="mt-5 text-lg font-medium leading-6 text-black">
                                                        {{ '¿Que es EngineDashboard?' }}
                                                    </p>
                                                </div>
                                                <div class="mt-2 text-base text-gray-500">
                                                    {{ Str::ucfirst('engineDashboard es un proyecto personal y un laboratorio multiproposito que utilizo para fines de entrenamiento y refuerzo de conocimientos adquiridos en diferentes medios ya sea educativos, tutoriales, comunidades y/o documentaciones.') }}
                                                </div>

                                                <div class="mt-2 text-base font-extrabold text-gray-500">
                                                    {{ Str::upper(__('nota: gran parte del conjunto de componentes de interfaz de usuario se extrajeron de flowbite y windstatic. NO SON CREADOS POR MI PERSONA')) }}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="py-12 mx-auto lg:py-16">
                                        <div class="mt-6 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-8">
                                            <div class="flex justify-center col-span-1 px-8">
                                                <a href="https://laravel.com/docs/1.x" target="_blank"
                                                    title="{{ Str::upper(__('laravel')) }}">
                                                    <img class="max-h-12" src="{{ asset('assets/svgs/laravel.svg') }}"
                                                        alt="Laravel"></a>
                                            </div>

                                            <div class="flex justify-center col-span-1 px-8">
                                                <a href="https://alpinejs.dev/" target="_blank"
                                                    title="{{ Str::upper(__('alpinejs')) }}">
                                                    <img class="max-h-12" src="{{ asset('assets/svgs/alpinejs.svg') }}"
                                                        alt="AlpineJs"></a>
                                            </div>

                                            <div class="flex justify-center col-span-1 px-8">
                                                <a href="https://tailwindcss.com/" target="_blank"
                                                    title="{{ Str::upper(__('tailwindcss')) }}">
                                                    <img class="max-h-12"
                                                        src="{{ asset('assets/svgs/tailwind-css.svg') }}"
                                                        alt="TailwindCSS"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
                    <div class="grid grid-cols-1 gap-12 lg:grid-cols-3 lg:gap-8">
                        <div class="lg:pr-24 md:pr-12">
                            <h2 class="text-4xl text-black">
                                {{ Str::ucfirst(__('¿Quien es el desarrollador?')) }}
                            </h2>
                        </div>

                        <div class="lg:col-span-2">
                            <ul role="list"
                                class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-12 sm:space-y-0 lg:gap-x-8">
                                <li>
                                    <div class="flex items-center space-x-4 lg:space-x-6">

                                        <img class="object-cover w-16 h-16 rounded-full lg:h-20 lg:w-20"
                                            src="{{ asset('assets/images/perfil.jpg') }}" alt="">

                                        <div class="space-y-1">

                                            <h3 class="text-lg font-medium leading-6 text-black">
                                                {{ 'MartzDev' }}
                                            </h3>

                                            <p class="text-base text-gray-500">
                                                {{ 'Ingeniero de Sistemas | Docente | Desarrollador Laravel' }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                    <div class="flex justify-center space-x-6 md:order-2">
                        <span class="inline-flex justify-center w-full gap-3 lg:ml-auto md:justify-start md:w-auto">
                            <a href="https://github.com/DevBuster" target="_blank"
                                class="w-10 h-10 transition fill-black hover:text-blue-500"
                                title="{{ Str::upper('github') }}">
                                <span class="sr-only">
                                    {{ Str::ucfirst(__('github')) }}
                                </span>
                                <img class="w-10 h-10 md hydrated" src="{{ asset('assets/svgs/github.svg') }}" />
                            </a>
                        </span>
                    </div>

                    <div class="mt-8 md:mt-0 md:order-1">
                        <p class="text-base text-center text-gray-400">
                            <span class="mx-auto mt-2 text-sm text-gray-500">
                                {{ 'Copyright © 2024' }}
                                <a href="https://github.com/MartzDev" target="_blank"
                                    class="mx-2 text-blue-500 hover:text-gray-500" rel="noopener noreferrer">
                                    @MartzDev
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
