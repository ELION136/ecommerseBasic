<x-admin-layout :breadcrumbs="[['name' => 'Dashboard', 'route' => route('admin.dashboard')], ['name' => 'categorias']]">


    <x-slot name="action">
        <a class="btn btn-blue font-bold py-2 px-4 rounded" href="{{ route('admin.categories.create') }}">
            Añadir categoria
        </a>
    </x-slot>

    <div class="card">


        @if ($categories->count())

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                familias

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                    {{ $category->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category->family->name }}
                                </td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-teal text-white font-bold py-2 px-4 rounded-full ">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828zM2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                        </svg>
                                    </a>

                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        @else
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> No existe familia registrada. Puedes crear una nueva
                    categoria
                </div>
            </div>

        @endif
    </div>



</x-admin-layout>
