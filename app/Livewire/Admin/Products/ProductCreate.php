<?php

namespace App\Livewire\Admin\Products;

use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\Family;
use App\Models\Category;

class ProductCreate extends Component
{
    public $families;
    public $family_id = '';
    public $category_id = '';
    public $product=[
        'sku' => '',
        'name' => '',
        'description' => '',
        'imagen_path' => '',
        'price' => '',
        'subcategory_id' => '',
    ];
    public function mount()
    {
        $this->families =Family::all(); 
    }
    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.products.product-create');
    }
}
