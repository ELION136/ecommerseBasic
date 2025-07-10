<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
    ['name' => 'familias', 'route' => route('admin.families.index')],
    ['name' => 'Crear familia'],
]">

    <div class="card">

        <form action="{{ route('admin.families.store') }}" method="POST" class="p-6">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la
                    familia</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="Ingrese el nombre de la familia">
                  @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="text-right">
            <x-button type="submit" >Crear Familia</x-button>
             </div>

        </form>
    </div>




</x-admin-layout>
