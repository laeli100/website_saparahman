<?php

namespace App\Http\Controllers;

use App\Models\KandunganMading;
use App\Models\KategoriMading;
use App\Models\mading;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KandunganMadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KandunganMading::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('kandungan-mading.edit', $row->id);
                    $show = route('kandungan-mading.show', $row->id);
                    $delete = route('kandungan-mading.destroy', $row->id);
                    return "
                        <a href='$show' class='btn btn-info btn-sm'>Lihat</a>
                        <a href='$edit' class='btn btn-warning btn-sm'>Edit</a>
                        <form action='$delete' method='POST' style='display:inline-block' class='delete-form'>
                            " . csrf_field() . method_field('DELETE') . "
                            <button type='submit' onclick='return confirm(\"Yakin hapus?\")' class='btn btn-danger btn-sm'>Hapus</button>
                        </form>
                    ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kandungan_mading.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mading = mading::all();
        return view('kandungan_mading.create',compact('mading'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mading' => 'required|string',
            'judul' => 'required|string',
            'file' => 'required|file',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('kandungan_mading_files', 'public');
        }

        KandunganMading::create([
            'id_mading' => $request->id_mading,
            'judul' => $request->judul,
            'file' => $filePath,
            'created_by' => 1, // Sementara
        ]);

        return redirect()->route('kandungan-mading.index')->with('success', 'Kandungan Mading berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kandunganMading = KandunganMading::findOrFail($id);
        return view('kandungan_mading.show', compact('kandunganMading'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kandunganMading = KandunganMading::findOrFail($id);
        return view('kandungan_mading.edit', compact('kandunganMading'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mading' => 'required|string',
            'judul' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $kandunganMading = KandunganMading::findOrFail($id);

        // If there's a new file to upload
        $filePath = $kandunganMading->file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('kandungan_mading_files', 'public');
        }

        $kandunganMading->update([
            'id_asas' => $request->id_asas,
            'id_mading' => $request->id_mading,
            'judul' => $request->judul,
            'file' => $filePath,
            'updated_by' => 1, // Sementara
        ]);

        return redirect()->route('kandungan-mading.index')->with('success', 'Kandungan Mading berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kandunganMading = KandunganMading::findOrFail($id);
        $kandunganMading->update(['deleted_by' => 1]);
        $kandunganMading->delete();

        return redirect()->route('kandungan-mading.index')->with('success', 'Kandungan Mading berhasil dihapus.');
    }
}
