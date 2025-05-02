<?php

namespace App\Http\Controllers;

use App\Models\KandunganMading;
use App\Models\Mading;
use App\Models\MasterAsas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KandunganMadingController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $data = KandunganMading::with('asas')->select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('id_asas', function ($row) {
                return $row->asas ? $row->asas->nama_asas : '-';
            })
            ->addColumn('file', function ($row) {
                return $row->file ? '<a href="' . asset("storage/{$row->file}") . '" target="_blank">Lihat File</a>' : '-';
            })
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
            ->rawColumns(['file', 'action'])
            ->make(true);
    }

    return view('kandungan_mading.index');
}


    public function create()
    {
        $mading = Mading::all();
        $asass = MasterAsas::all();
        return view('kandungan_mading.create', compact('asass', 'mading'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_asas' => 'required|exists:master_asas,id',
            'nama_pengampu' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file' => 'required|file',
            'desk' => 'required|string|max:255',
        ]);

        $filePath = $request->file('file')->store('kandungan_mading_files', 'public');

        KandunganMading::create([
            'id_asas' => $request->id_asas,
            'nama_pengampu' => $request->nama_pengampu,
            'judul' => $request->judul,
            'file' => $filePath,
            'desk' => $request->desk,
            'created_by' => 1, // sementara
        ]);

        return redirect()->route('kandungan-mading.index')->with('success', 'Kandungan Mading berhasil disimpan.');
    }

    public function show($id)
    {
        $kandunganMading = KandunganMading::findOrFail($id);
        return view('kandungan_mading.show', compact('kandunganMading'));
    }

    public function edit($id)
    {
        $kandunganMading = KandunganMading::findOrFail($id);
        $asass = MasterAsas::all();
        $mading = Mading::all();
        return view('kandungan_mading.edit', compact('kandunganMading', 'asass', 'mading'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_asas' => 'required|exists:master_asas,id',
            'nama_pengampu' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file',
            'desk' => 'required|string|max:255',
        ]);

        $kandunganMading = KandunganMading::findOrFail($id);

        $filePath = $kandunganMading->file;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('kandungan_mading_files', 'public');
        }

        $kandunganMading->update([
            'id_asas' => $request->id_asas,
            'nama_pengampu' => $request->nama_pengampu,
            'judul' => $request->judul,
            'file' => $filePath,
            'desk' => $request->desk,
            'updated_by' => 1,
        ]);

        return redirect()->route('kandungan-mading.index')->with('success', 'Kandungan Mading berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kandunganMading = KandunganMading::findOrFail($id);
        $kandunganMading->update(['deleted_by' => 1]);
        $kandunganMading->delete();

        return redirect()->route('kandungan-mading.index')->with('success', 'Kandungan Mading berhasil dihapus.');
    }
}
