<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Guru::with(['kelas', 'creator'])->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kelas_name', function ($row) {
                    return $row->kelas ? $row->kelas->nama_kelas : '-';
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('guru.edit', $row->id) . '" class="btn btn-sm btn-warning mx-1">Edit</a>';
                    $deleteBtn = '<form action="' . route('guru.destroy', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</button>
                                  </form>';
                    return $editBtn . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('guru.index');
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('guru.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:gurus',
            'email' => 'required|email|unique:gurus',
            'id_kelas' => 'required|exists:kelas,id'
        ]);

        Guru::create([
            'nama_guru' => $validated['nama_guru'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'id_kelas' => $validated['id_kelas'],
            'created_by' => 1
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        $kelas = Kelas::all();
        return view('guru.edit', compact('guru', 'kelas'));
    }

    public function update(Request $request, Guru $guru)
    {
        $rules = [
            'nama_guru' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:gurus,username,' . $guru->id,
            'email' => 'required|email|unique:gurus,email,' . $guru->id,
            'id_kelas' => 'required|exists:kelas,id'
        ];


        $validated = $request->validate($rules);

        $data = [
            'nama_guru' => $validated['nama_guru'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'id_kelas' => $validated['id_kelas'],
            'updated_by' => Auth::id()
        ];

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy(Guru $guru)
    {
        $guru->update(['deleted_by' => Auth::id()]);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
    }
}
