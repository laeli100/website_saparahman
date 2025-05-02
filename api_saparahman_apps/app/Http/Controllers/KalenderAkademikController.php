<?php

namespace App\Http\Controllers;

use App\Models\KalenderAkademik;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KalenderAkademikController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KalenderAkademik::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('kalender_akademik.edit', $row->id);
                    $show = route('kalender_akademik.show', $row->id);
                    $delete = route('kalender_akademik.destroy', $row->id);
                    return "
                        <a href='$show' class='btn btn-info btn-sm'>Lihat</a>
                        <a href='$edit' class='btn btn-warning btn-sm'>Edit</a>
                        <form action='$delete' method='POST' style='display:inline-block'>
                            " . csrf_field() . method_field('DELETE') . "
                            <button type='submit' onclick='return confirm(\"Yakin hapus?\")' class='btn btn-danger btn-sm'>Hapus</button>
                        </form>
                    ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kalender_akademik.index');
    }

    public function create()
    {
        return view('kalender_akademik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'libur_akademik' => 'required',
            'keterangan' => 'required|string',
            'tahun_ajaran' => 'required|string',
        ]);

        KalenderAkademik::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'libur_akademik' => $request->libur_akademik,
            'keterangan' => $request->keterangan,
            'tahun_ajaran' => $request->tahun_ajaran,
            'created_by' => 1,
        ]);

        return redirect()->route('kalender_akademik.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(KalenderAkademik $kalenderAkademik)
    {
        return view('kalender_akademik.edit', compact('kalenderAkademik'));
    }

    public function update(Request $request, KalenderAkademik $kalenderAkademik)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'libur_akademik' => 'required',
            'keterangan' => 'required|string',
            'tahun_ajaran' => 'required|string',
        ]);

        $kalenderAkademik->update([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'libur_akademik' => $request->libur_akademik,
            'keterangan' => $request->keterangan,
            'tahun_ajaran' => $request->tahun_ajaran,
            'updated_by' => 1,
        ]);

        return redirect()->route('kalender_akademik.index')->with('success', 'Data berhasil diupdate.');
    }

    public function show(KalenderAkademik $kalenderAkademik)
    {
        return view('kalender_akademik.show', compact('kalenderAkademik'));
    }

    public function destroy(KalenderAkademik $kalenderAkademik)
    {
        $kalenderAkademik->update(['deleted_by' => 1]);
        $kalenderAkademik->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
