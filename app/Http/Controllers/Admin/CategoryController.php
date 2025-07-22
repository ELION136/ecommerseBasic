<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::orderBy('id', 'asc')->paginate(12);
        return view('admin.categories.index', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families= Family::all();
        return view('admin.categories.create', compact('families'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* try { */
            $request->validate([
                'family_id' => 'required|exists:families,id',
                'name' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|unique:categories,name',
            ]);

            Category::create($request->all());

            return redirect()->route('admin.categories.index')
                ->with('success', 'Categoría creada exitosamente.');

        /* } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear la categoría: ' . $e->getMessage())
                ->withInput();
        } */
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $families = Family::all();

         return view('admin.categories.edit', compact('category', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // return $request->all();
        $request->validate([
            'family_id' => 'required|exists:families,id',
            'name' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|unique:categories,name,',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
