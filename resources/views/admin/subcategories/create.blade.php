<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
    ['name' => 'Subcategorias', 'route' => route('admin.subcategories.index')],
    ['name' => 'Crear subcategoria'],
]">

    <form action="{{ route('admin.subcategories.store') }}" method="POST">
        @csrf
        <div class="card">

            <x-validation-errors class="mb-4" :errors="$errors" />
            <div class="mb-4">
                <x-label class="mb-3">
                    categorias
                </x-label>

                <x-select name="category_id" class="w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>


            </div> 
            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input class="w-full" placeholder="ingrese nombre de la subcategoria" name="name"
                    value="{{ old('name') }}" />


            </div>
            <div class="flex justify-end">
                <x-button type="submit">Crear Subcategoria</x-button>

            </div>

        </div>
    </form>



</x-admin-layout>
