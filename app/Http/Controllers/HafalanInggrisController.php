<?php

namespace App\Http\Controllers;

use App\Models\HafalanInggris;
use App\Models\Santri;
use App\Models\Inggris;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HafalanInggrisController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HafalanInggris::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('santri', fn($row) => $row->santri->nama_santri ?? '-')
                ->addColumn('inggris', fn($row) => $row->inggris->subjek ?? '-')
                ->addColumn('action', function ($row) {
                    $edit = route('hafalan-inggris.edit', $row->id);
                    $delete = route('hafalan-inggris.destroy', $row->id);
                    return "
                        <a href='$edit' class='btn btn-primary btn-sm'>Edit</a>
                        <form action='$delete' method='POST' style='display:inline-block'>
                            " . csrf_field() . method_field('DELETE') . "
                            <button type='submit' onclick='return confirm(\"Yakin hapus?\")' class='btn btn-danger btn-sm'>Hapus</button>
                        </form>
                    ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('hafalan_inggris.index');
    }

    public function create()
    {
        $santriList = Santri::all();
        $inggrisList = Inggris::all();
        $nilaiOptions = ['A', 'B', 'C', 'D'];
        return view('hafalan_inggris.create', compact('santriList', 'inggrisList', 'nilaiOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_santri' => 'required',
            'id_inggris' => 'required',
            'tgl_setoran' => 'required|date',
            'nilai' => 'required|in:A,B,C,D',
        ]);

        $validated['created_by'] = 1;

        HafalanInggris::create($validated);

        return redirect()->route('hafalan-inggris.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hafalanInggris = HafalanInggris::findOrFail($id);
        $santriList = Santri::all();
        $inggrisList = Inggris::all();
        $nilaiOptions = ['A', 'B', 'C', 'D'];
        return view('hafalan_inggris.edit', compact('hafalanInggris', 'santriList', 'inggrisList', 'nilaiOptions'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_santri' => 'required',
            'id_inggris' => 'required',
            'tgl_setoran' => 'required|date',
            'nilai' => 'required|in:A,B,C,D',
        ]);

        $validated['updated_by'] = 1;
        $hafalanInggris = HafalanInggris::findOrFail($id);
        $hafalanInggris->update($validated);

        return redirect()->route('hafalan-inggris.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = HafalanInggris::findOrFail($id);
        $data->deleted_by = 1;
        $data->save();
        $data->delete();

        return redirect()->route('hafalan-inggris.index')->with('success', 'Data berhasil diperbarui');
    }
}
