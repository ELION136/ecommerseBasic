<?php

namespace App\Livewire\Admin\Subcategories;
use App\Models\Family;
use App\Models\Category;
use App\Models\Subcategory;

use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryCreate extends Component
{
    public $families;
    public $subcategory=[
        'family_id' => '',
        'name' => '',
        'category_id' => ''
    ];

    public function mount()
    {
        $this->families = Family::all();
    }

    public function updatedSubcategoryFamilyId()
    {
        $this->subcategory['category_id'] = ''; // Reset category_id when family_id changes
    }




    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->subcategory['family_id'])->get();
    }
    public function save()
    {
        $this->validate([
            'subcategory.family_id' => 'required|exists:families,id',
            'subcategory.name' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|unique:subcategories,name',
            'subcategory.category_id' => 'required|exists:categories,id',
        ],[],[
            'subcategory.family_id' => 'Familia',
            'subcategory.name' => 'Nombre',
            'subcategory.category_id' => 'Categoría',
        ]);

        try {
            Subcategory::create($this->subcategory);

            return redirect()->route('admin.subcategories.index')
                ->with('success', 'Subcategoría creada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear la subcategoría: ' . $e->getMessage())
                ->withInput();
        }
    }
    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-create');
    }
}
