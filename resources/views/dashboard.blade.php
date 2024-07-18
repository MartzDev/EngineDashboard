<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg shadow-2xl bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        {{ Str::title(__('Dashboard')) }}
                    </a>
                </li>
            </ol>
        </nav>
        {{-- <p class="text-4xl font-medium text-gray-900 dark:text-white">{{ Str::title(__('Dashboard')) }}</p> --}}
    </x-slot>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">


            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center uppercase">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3 text-center uppercase">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center uppercase">
                            cargo
                        </th>
                        <th scope="col" class="px-6 py-3 text-center uppercase">
                            estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-center uppercase">
                            accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr
                            class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                {{ $user->id }}
                            </td>

                            <td scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $user->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar
                                    usuario</a>
                                <a href="#"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">eliminar
                                    usuario</a>
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
        </div>
        <nav class="p-4 text-xs text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-400"
            aria-label="Table navigation">
            {{ $users->links() }}
        </nav>
    </div>
</x-app-layout>
