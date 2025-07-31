<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    private function getMaterialsFromCSV()
    {
        $materials = [];
        $path = base_path('material.csv');
        if (File::exists($path)) {
            $file = File::get($path);
            $rows = explode("\n", $file);
            foreach ($rows as $row) {
                $data = str_getcsv($row);
                if (isset($data[1]) && isset($data[2])) {
                    $materials[$data[1]] = $data[2];
                }
            }
        }
        return $materials;
    }

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
        $materialNames = $this->getMaterialsFromCSV();
        return view('pages.material.tambah_alat', compact('materialNames'));
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
                'evidence.*' => 'nullable|string',
            ]);

            $data = $request->except('evidence', 'keterangan');
            $materials = $this->getMaterialsFromCSV();
            $data['keterangan'] = $materials[$request->name] ?? '';

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

                        file_put_contents($path, $imageData);

                        $evidencePaths[] = $fileName;
                    }
                }
            }

            $data['evidence'] = json_encode($evidencePaths);

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
        $materialNames = $this->getMaterialsFromCSV();
        return view('pages.material.edit_alat', compact('material', 'materialNames'));
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
            ]);

            $data = $request->except('keterangan');
            $materials = $this->getMaterialsFromCSV();
            $data['keterangan'] = $materials[$request->name] ?? '';

            $material->update($data);
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
