<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PeraturanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Peraturan::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('file', function ($row) {
                    return "<a href='" . asset('storage/peraturans/' . $row->file) . "' target='_blank'>Lihat File</a>";
                })
                ->addColumn('action', function ($row) {
                    $edit = route('peraturan.edit', $row->id);
                    $show = route('peraturan.show', $row->id);
                    $delete = route('peraturan.destroy', $row->id);
                    return "
                        <a href='$show' class='btn btn-info btn-sm'>Lihat</a>
                        <a href='$edit' class='btn btn-warning btn-sm'>Edit</a>
                        <form action='$delete' method='POST' style='display:inline-block'>
                            " . csrf_field() . method_field('DELETE') . "
                            <button type='submit' onclick='return confirm(\"Yakin hapus?\")' class='btn btn-danger btn-sm'>Hapus</button>
                        </form>
                    ";
                })
                ->rawColumns(['action', 'file'])
                ->make(true);
        }

        return view('peraturan.index');
    }

    public function create()
    {
        return view('peraturan.create');
    }

    public function store(Request $request)
    {
        // dd($request->file('file'));
        $request->validate([
            'nama_peraturan' => 'required|string',
            'file' => 'required|mimes:png,jpeg,jpg,pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/peraturans', $fileName);

        Peraturan::create([
            'nama_peraturan' => $request->nama_peraturan,
            'file' => $fileName,
        ]);

        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil disimpan.');
    }

    public function show(Peraturan $peraturan)
    {
        return view('peraturan.show', compact('peraturan'));
    }

    public function edit(Peraturan $peraturan)
    {
        return view('peraturan.edit', compact('peraturan'));
    }

    public function update(Request $request, Peraturan $peraturan)
    {
        $request->validate([
            'nama_peraturan' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = ['nama_peraturan' => $request->nama_peraturan];

        if ($request->hasFile('file')) {
            if ($peraturan->file && Storage::exists('public/peraturans/' . $peraturan->file)) {
                Storage::delete('public/peraturans/' . $peraturan->file);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/peraturans', $fileName);
            $data['file'] = $fileName;
        }

        $peraturan->update($data);

        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil diperbarui.');
    }

    public function destroy(Peraturan $peraturan)
    {
        if ($peraturan->file && Storage::exists('public/peraturans/' . $peraturan->file)) {
            Storage::delete('public/peraturans/' . $peraturan->file);
        }

        $peraturan->delete();

        return back()->with('success', 'Peraturan berhasil dihapus.');
    }
}
