<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SantriController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $santris = Santri::whereNull('deleted_at')->get();

            return DataTables::of($santris)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('santri.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a> ';
                    $btn .= '<form action="'.route('santri.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin?\')">Hapus</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('santri.index');
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('santri.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_santri' => 'required|string|max:255',
            'nisn' => 'required|string|max:50',
            'nis' => 'required|string|max:50',
            'nsm' => 'required|string|max:50',
            'npsm' => 'required|string|max:50',
            'id_kelas' => 'required|exists:kelas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Santri::create([
            'nama_santri' => $request->nama_santri,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nsm' => $request->nsm,
            'npsm' => $request->npsm,
            'id_kelas' => $request->id_kelas,
            'created_by' => 1, // Hardcode sementara
        ]);

        return redirect()->route('santri.index')->with('success', 'Santri berhasil ditambahkan.');
    }

    public function show(Santri $santri)
    {
        return view('santri.show', compact('santri'));
    }

    public function edit(Santri $santri)
    {
        $kelas = Kelas::all();
        return view('santri.edit', compact('santri', 'kelas'));
    }

    public function update(Request $request, Santri $santri)
    {
        $validator = Validator::make($request->all(), [
            'nama_santri' => 'required|string|max:255',
            'nisn' => 'required|string|max:50',
            'nis' => 'required|string|max:50',
            'nsm' => 'required|string|max:50',
            'npsm' => 'required|string|max:50',
            'id_kelas' => 'required|exists:kelas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $santri->update([
            'nama_santri' => $request->nama_santri,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nsm' => $request->nsm,
            'npsm' => $request->npsm,
            'id_kelas' => $request->id_kelas,
            'updated_by' => 1, // Hardcode sementara
        ]);

        return redirect()->route('santri.index')->with('success', 'Santri berhasil diupdate.');
    }

    public function destroy(Santri $santri)
    {
        $santri->update([
            'deleted_by' => 1, // Hardcode sementara
        ]);
        $santri->delete();

        return redirect()->route('santri.index')->with('success', 'Santri berhasil dihapus.');
    }
}
