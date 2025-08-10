<div class="card">
    
    <div class="mb-4">
        <x-label class="mb-1">
            Codigo
        </x-label>
        <x-input type="text" wire:model="product.sku" class="w-full"
        placeholder="por favor introdusca el codigo" />

    </div>

    <div class="mb-4">
        <x-label class="mb-1">
            Nombre
        </x-label>
        <x-input type="text" wire:model="product.name" class="w-full"
        placeholder="por favor introdusca el nombre" />
    </div>

     <div class="mb-4">
        <x-label class="mb-1">
            Descripcion
        </x-label>
        <x-textarea type="text" wire:model="product.description" class="w-full"
        placeholder="por favor introdusca una Descripcion" >
        </x-textarea>

    </div>
    <div class="mb-4">
        <x-label class="mb-1">
            Familias
        </x-label>

        <x-select class="w-full" wire:model.live="family_id">
            <option value="" disabled>Seleccione una familia</option>

            @foreach ($families as $family)

                <option value="{{ $family->id }}">{{ $family->name }}

                </option>
            @endforeach

        </x-select>
        
    </div>

    
    <div class="mb-4">
        <x-label class="mb-1">
            Categorias
        </x-label>

        <x-select class="w-full" wire:model.live="category_id">
            <option value="" disabled>Seleccione una Categoria</option>

            @foreach ($this->categories() as $category)

                <option value="{{ $category->id }}">{{ $category->name }}

                </option>
            @endforeach

        </x-select>
        
    </div>
</div>
