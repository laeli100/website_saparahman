<?php

namespace App\Http\Controllers;

use App\Models\HafalanSurah;
use App\Models\Santri;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HafalanSurahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HafalanSurah::select('*')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('santri', function ($row) {
                    return $row->santri->nama_santri ?? '-';
                })
                ->addColumn('surah', function ($row) {
                    return $row->surah->nama_surah ?? '-';
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('hafalan-surah.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger" onclick="deleteData(' . $row->id . ')">Hapus</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('hafalan_surah.index');
    }

    public function create()
    {
        $santriList = Santri::all();
        $surahList = Surah::all();
        return view('hafalan_surah.create', compact('santriList', 'surahList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_santri' => 'required',
            'id_surah' => 'required',
            'tgl_setoran' => 'required|date',
            'nilai' => 'required|string|max:10',
        ]);

        $validated['created_by'] = 1;

        HafalanSurah::create($validated);

        return redirect()->route('hafalan-surah.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(HafalanSurah $hafalanSurah)
    {
        $santriList = Santri::all();
        $surahList = Surah::all();
        return view('hafalan_surah.edit', compact('hafalanSurah', 'santriList', 'surahList'));
    }

    public function update(Request $request, HafalanSurah $hafalanSurah)
    {
        $validated = $request->validate([
            'id_santri' => 'required',
            'id_surah' => 'required|exists:surah,id',
            'tgl_setoran' => 'required|date',
            'nilai' => 'required|string|max:10',
        ]);

        $validated['updated_by'] = 1;

        $hafalanSurah->update($validated);

        return redirect()->route('hafalan-surah.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = HafalanSurah::findOrFail($id);
        $data->deleted_by = 1;
        $data->save();
        $data->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
