<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
    ['name' => 'Catergorias', 'route' => route('admin.categories.index')],
    ['name' => 'Crear categoria'],
]">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="card">

            <x-validation-errors class="mb-4" :errors="$errors" />
            <div class="mb-4">
                <x-label class="mb-3">
                    Familia
                </x-label>

                <x-select name="family_id" class="w-full">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </x-select>


            </div>
            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input class="w-full" placeholder="ingrese nombre de la categoria" name="name"
                    value="{{ old('name') }}" />


            </div>
            <div class="flex justify-end">
                <x-button type="submit">Crear Categoria</x-button>

            </div>

        </div>
    </form>



</x-admin-layout>
