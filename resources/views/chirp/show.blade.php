<x-app-layout>
    {{-- <p class="text-4xl font-medium text-gray-900 dark:text-white first-letter:uppercase">crear chirp</p> --}}
    <x-slot name="header">
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ul class="inline-flex items-center">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                        <p class="px-2">{{ Str::title(__('Dashboard')) }}</p>
                    </a>
                </li>

                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>

                <li class="inline-flex items-center">

                    <a href="{{ route('chirp.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <p class="px-2 first-letter:uppercase">chirp</p>
                    </a>
                </li>

                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>

                <li class="inline-flex items-center">
                    <p class="px-2 text-sm font-medium text-gray-500 dark:text-gray-400 first-letter:uppercase">
                        mostrar {{ $chirp->slug }}</p>
                </li>
            </ul>
        </nav>
    </x-slot>

    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <x-label for="slug" value="slug" class="mb-2" />
        <x-input id="slug" name="slug" type="text" class="w-full mb-2" readonly :value="old('slug', $chirp)" />
        <x-input-error for="slug" class="mb-2" />

        <x-label for="message" value="message" class="mb-2" />
        <textarea id="message" name="message" required placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            readonly>{{ old('message', $chirp) }}</textarea>
        <x-input-error for="message" class="mb-2" />
    </div>
</x-app-layout>
