<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('pages.material.data_alat', compact('materials'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.material.tambah_alat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'quantity' => 'required|integer',
                'location' => 'required|string|max:255',
                'mitra' => 'required|string|max:255',
                'teknisi' => 'required|string|max:255',
                'status' => 'required|in:IN,OUT',
                'date' => 'required|date',
            ]);

            Material::create($request->all());
            return redirect()->route('material.index')->with('success', 'Data material berhasil ditambah.');
        } catch(\Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data material. Silakan coba lagi.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('pages.material.edit_alat', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'quantity' => 'required|integer',
                'location' => 'required|string|max:255',
                'mitra' => 'required|string|max:255',
                'teknisi' => 'required|string|max:255',
                'status' => 'required|in:IN,OUT',
                'date' => 'required|date',
            ]);

            $material->update($request->all());
            return redirect()->route('material.index')->with('success', 'Data material berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data material. Silakan coba lagi.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        try {
            $material->delete();
            return redirect()->route('material.index')->with('success', 'Data material berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data material. Silakan coba lagi.');
        }
    }
}
