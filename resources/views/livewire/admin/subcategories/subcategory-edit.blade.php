<div>
    <form wire:submit.prevent="save">

        <div class="card">

            <x-validation-errors class="mb-4" :errors="$errors" />

            <div class="mb-4">
                <x-label class="mb-3">
                    familias
                </x-label>
                <x-select class="w-full" wire:model.live="subcategoryEdit.family_id">
                    <option value="">
                        seleccione una familia
                    </option>
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-3">
                    categorias
                </x-label>

                <x-select name="category_id" class="w-full" wire:model.live="subcategoryEdit.category_id">
                    <option value="" disabled>
                        seleccione una categoria
                    </option>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>


            </div>
            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input class="w-full"
                 placeholder="ingrese nombre de la subcategoria" 
                 wire:model="subcategoryEdit.name"/>


            </div>
            <div class="flex justify-end">
                <x-button type="submit">Crear Subcategoria</x-button>

            </div>

        </div>
    </form>


    @dump($subcategory)
</div>
