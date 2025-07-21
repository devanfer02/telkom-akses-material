<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function timestamp()
    {
        return view('pages.material.timestamp');
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
                'satuan' => 'required|in:pack,pcs,buah',
                'location' => 'required|string|max:255',
                'mitra' => 'required|string|max:255',
                'teknisi' => 'required|string|max:255',
                'status' => 'required|in:IN,OUT',
                'date' => 'required|date',
                'keterangan' => 'nullable|string',
                'evidence.*' => 'nullable|string',
            ]);

            $data = $request->except('evidence');
            $evidencePaths = [];

            if ($request->has('evidence')) {
                foreach ($request->evidence as $base64) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
                        $imageData = substr($base64, strpos($base64, ',') + 1);
                        $type = strtolower($type[1]); // jpg, png, gif

                        $imageData = base64_decode($imageData);
                        if ($imageData === false) {
                            continue;
                        }

                        $fileName = 'evidence/' . Str::random(10) . '_' . time() . '.' . $type;
                        $path = public_path('uploads/' . $fileName);
                        //Storage::disk('public')->put($fileName, $imageData);

                        file_put_contents($path, $imageData);

                        $evidencePaths[] = $fileName;
                    }
                }
            }

            $data['evidence'] = json_encode($evidencePaths);
            $data['keterangan'] = $request->keterangan ?? '';


            Material::create($data);
            return redirect()->route('material.index')->with('success', 'Data material berhasil ditambah.');
        } catch(\Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data material. Silakan coba lagi.')->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('pages.material.show', compact('material'));
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
                'satuan' => 'required|in:pack,pcs,buah',
                'location' => 'required|string|max:255',
                'mitra' => 'required|string|max:255',
                'teknisi' => 'required|string|max:255',
                'status' => 'required|in:IN,OUT',
                'date' => 'required|date',
                'keterangan' => 'nullable|string',
            ]);

            $material->update($request->all());
            return redirect()->route('material.index')->with('success', 'Data material berhasil diperbarui.');
        } catch (\Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data material. Silakan coba lagi.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        try {
            if ($material->evidence) {
                $evidencePaths = json_decode($material->evidence);

                foreach($evidencePaths as $evidence) {
                    $filePath = public_path('uploads/' . $evidence);

                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }


            $material->delete();
            return redirect()->route('material.index')->with('success', 'Data material berhasil dihapus.');
        } catch (\Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data material. Silakan coba lagi.');
        }
    }
}
