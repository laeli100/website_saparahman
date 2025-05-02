<?php

namespace App\Http\Controllers;

use App\Models\jenis_kasus;
use App\Models\Kasus;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KasusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kasus = Kasus::all();
            return DataTables::of($kasus)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('kasus.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="' . route('kasus.show', $row->id) . '" class="show btn btn-info btn-sm">Show</a>';
                    $btn .= ' <form action="' . route('kasus.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kasus.index');
    }
    public function create()
    {
        $jenisKasus = jenis_kasus::all();  // Assuming you have a JenisKasus model
        $santris = Santri::all();  // Assuming you have a Santri model

        return view('kasus.create', compact('jenisKasus', 'santris'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'jenis_pelanggaran'  => 'required',
            'tgl_kejadian' => 'required',
            'ket_pelanggaran' => 'required',
            'desc_penyelesaian' => 'required',
            'id_jenis_kasus' => 'required',
            'id_santri' => 'required',
        ]);

        $input = $request->all();
        $input['created_by'] = 1;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Kasus::create($input);

        return redirect()->route('kasus.index')->with('success', 'Kasus Created Successfully');
    }

    public function show($id)
    {
        $kasus = Kasus::with(['santri', 'jenisKasus'])->findOrFail($id);
        return view('kasus.show', compact('kasus'));
    }
    public function edit($id)
    {
        $jenisKasus = jenis_kasus::all();
        $santris = Santri::all();

        $kasus = Kasus::findOrFail($id);

        return view('kasus.edit', compact('kasus', 'jenisKasus', 'santris'));
    }

    public function update(Request $request, Kasus $kasus)
    {

        $validator = Validator::make($request->all(), [
            'tgl_kejadian' => 'required',
            'ket_pelanggaran' => 'required',
            'desc_penyelesaian' => 'required',
            'id_jenis_kasus' => 'required',
            'id_santri' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $input["updated_by"] = 1;

        $kasus->update($input);

        return redirect()->route('kasus.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Kasus $kasus)
    {
        $kasus->delete();

        return redirect()->route('kasus.index')->with('success', 'Kasus deleted successfully.');
    }
}
