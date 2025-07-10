<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
    ['name' => 'Familias', 'route' => route('admin.families.index')],
    ['name' => 'Editar ' . ($family->name ?? 'Sin nombre')],
]">

<div class="card p-6">
     <!-- Mensaje de debug (opcional, puedes eliminarlo después) -->
        

        <!-- Formulario de edición -->
        <form action="{{ route('admin.families.update', $family) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la Familia</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $family->name) }}"
                    class="mt-1 block w-full  rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-500 @enderror">
                
                <!-- Mostrar mensaje de error si hay uno -->
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.families.index') }}" 
                   class="btn btn-red mr-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-blue">
                    Actualizar Familia
                </button>
            </div>
        </form>
</div>

</x-admin-layout>