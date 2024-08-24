<x-app-layout>
    {{-- <p class="text-4xl font-medium text-gray-900 dark:text-white first-letter:uppercase">chirp</p> --}}
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
                    <p class="px-2 text-sm font-medium text-gray-500 dark:text-gray-400 first-letter:uppercase">chirp
                    </p>
                </li>
            </ul>
        </nav>
    </x-slot>

    <div class="flex justify-end pb-5">
        <x-secondary-button><a href="{{ route('chirp.create') }}">crear chirp</a></x-button-button>
    </div>

    @if (session('estado'))
        <p>creado</p>
    @endif

    <div class="shadow sm:rounded-lg bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center uppercase">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3 text-center uppercase">
                        slug
                    </th>
                    <th scope="col" class="px-6 py-3 text-center uppercase">
                        message
                    </th>
                    <th scope="col" class="px-6 py-3 text-center uppercase">
                        created_at
                    </th>
                    <th scope="col" class="px-6 py-3 text-center uppercase">
                        updated_at
                    </th>
                    <th scope="col" class="px-6 py-3 text-center uppercase">
                        opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chirps as $chirp)
                    <tr
                        class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4" scope="row">
                            {{ $chirp->id }}
                        </td>

                        <td class="px-6 py-4" scope="row">
                            {{ $chirp->slug }}
                        </td>

                        <td class="px-6 py-4" scope="row">
                            {{ $chirp->message }}
                        </td>

                        <td class="px-6 py-4" scope="row">
                            {{ $chirp->created_at }}
                        </td>

                        <td class="px-6 py-4" scope="row">
                            {{ $chirp->updated_at }}
                        </td>

                        <td class="px-6 py-4" scope="row">
                            <div class="flex items-center justify-center">
                                <a href="{{ route('chirp.edit', $chirp) }}"
                                    class="pr-2 font-bold text-blue-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                        <path
                                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                        <path d="m15 5 4 4" />
                                    </svg>
                                </a>

                                <a href="{{ route('chirp.show', $chirp) }}"
                                    class="pr-2 font-bold text-yellow-300 dark:text-yellow-300 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </a>

                                <form action="{{ route('chirp.destroy', $chirp) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="pr-2 font-bold text-red-600 dark:text-red-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-trash-2">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            <line x1="10" x2="10" y1="11" y2="17" />
                                            <line x1="14" x2="14" y1="11" y2="17" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            registro vacio
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-5 bg-gray-50">
            {{ $chirps->links() }}
        </div>
    </div>
</x-app-layout>
