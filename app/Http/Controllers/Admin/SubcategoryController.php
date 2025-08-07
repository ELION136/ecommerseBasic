<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'desc')
            ->with('category.family')
            ->paginate(8);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= category::all();
        return view('admin.subcategories.create', compact('categories'));
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* return $request->all();  para ver si se resive algo o no*/
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
        ]);
        try {
            Subcategory::create($request->all());

            return redirect()->route('admin.subcategories.index')
                ->with('success', 'Subcategoría creada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear la subcategoría: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
