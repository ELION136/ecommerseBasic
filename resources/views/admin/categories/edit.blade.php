<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
    ['name' => 'Catergorias', 'route' => route('admin.categories.index')],
    ['name' => $category->name],
]">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">

            <x-validation-errors class="mb-4" :errors="$errors" />
            <div class="mb-4">
                <x-label class="mb-3">
                    Familia
                </x-label>

                <x-select name="family_id" class="w-full">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}" @selected(old('family_id', $category->family_id) == $family->id)>
                            {{ $family->name }}</option>
                    @endforeach
                </x-select>


            </div>
            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input class="w-full" placeholder="ingrese nombre de la categoria" name="name"
                    value="{{ old('name', $category->name) }}" />


            </div>
            <div class="flex justify-end">
                <x-button type="submit">Actualizar</x-button>

            </div>

        </div>
    </form>



</x-admin-layout>
