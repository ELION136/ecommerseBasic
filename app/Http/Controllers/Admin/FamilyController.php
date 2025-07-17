<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('id', 'asc')->
            paginate(8);
        return view('admin.families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|unique:families,name',
            ]);

            Family::create($request->all());

            return redirect()->route('admin.families.index')
                ->with('success', 'Familia creada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear la familia: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        // no se utiliza, pero se puede implementar si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        // Forzamos que busque directamente por ID y lanzará error si no existe

        return view('admin.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
        ]);

        $family->update($request->all());



        /* return redirect()->route('admin.families.index')->with('success', 'Familia actualizada correctamente.');*/
        return redirect()->route('admin.families.index', $family)
            ->with('success', 'Familia actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {

        if ($family->categories()->count() > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar la familia porque tiene categorías asociadas.');
        }

        try {
            $family->delete();
            return redirect()->route('admin.families.index')
                ->with('success', 'Familia eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar la familia: ' . $e->getMessage());
        }
    }
}
