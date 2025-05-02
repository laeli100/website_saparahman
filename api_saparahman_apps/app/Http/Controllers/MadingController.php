<?php

namespace App\Http\Controllers;

use App\Models\KategoriMading;
use App\Models\Mading;
use App\Models\MasterAsas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MadingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Mading::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('gambar', function ($row) {
                    $url = asset('storage/' . $row->gambar);
                    return '<img src="' . $url . '" width="80" height="60" style="object-fit:cover;" />';
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('mading.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" onclick="deleteData(' . $row->id . ')">Hapus</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['gambar', 'action']) // <== pastikan ini ada
                ->make(true);
        }


        return view('mading.index'); // Halaman Blade dengan DataTable
    }

    public function create()
    {
        $asass = MasterAsas::all();
        $kategoriMadings = KategoriMading::all();
        return view('mading.create',compact('asass','kategoriMadings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_asas' => 'required',
            'id_kategori_mading' => 'required',
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambaran_deskripsi' => 'required|string',
        ]);

        // Simpan gambar ke folder public/mading
        $path = $request->file('gambar')->store('mading', 'public');
        $validated['gambar'] = $path;

        $validated['created_by'] = 1;

        $mading = Mading::create($validated);

        return redirect()->route('mading.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit(Mading $mading)
    {
        return view('mading.edit', compact('mading'));
    }

    public function update(Request $request, Mading $mading)
    {
        // dd($request->all());
        $validated = $request->validate([
            'id_asas' => 'required',
            'id_kategori_mading' => 'required',
            'judul' => 'required',
            'gambaran_deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // (Opsional) Hapus gambar lama
            if ($mading->gambar && Storage::exists('public/' . $mading->gambar)) {
                Storage::delete('public/' . $mading->gambar);
            }

            $gambarPath = $request->file('gambar')->store('mading', 'public');
            $validated['gambar'] = $gambarPath;
        } else {
            // Pertahankan gambar lama
            $validated['gambar'] = $mading->gambar;
        }

        $validated['updated_by'] = Auth::id();

        $mading->update($validated);

        return redirect()->route('mading.index')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {
        $mading = Mading::findOrFail($id);
        $mading->deleted_by = 1;
        $mading->save();
        $mading->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
