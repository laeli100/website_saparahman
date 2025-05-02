<?php

namespace App\Http\Controllers;

use App\Models\detail_ekskul_raport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DetailEkskulRaportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = detail_ekskul_raport::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('detail_ekskul_raport.edit', $row->id);
                    $deleteUrl = route('detail_ekskul_raport.destroy', $row->id);
                    $btn = "<a href='$editUrl' class='btn btn-sm btn-primary'>Edit</a> ";
                    $btn .= "<form action='$deleteUrl' method='POST' style='display:inline-block;'>
                                " . csrf_field() . method_field('DELETE') . "
                                <button type='submit' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin mau hapus?\")'>Hapus</button>
                             </form>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('detail_ekskul_raport.index');
    }

    public function create()
    {
        return view('detail_ekskul_raport.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_raport' => 'required',
            'id_ekskul' => 'required',
            'nilai' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $input["created_by"] = 1;

        detail_ekskul_raport::create($input);

        return redirect()->route('detail_ekskul_raport.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(detail_ekskul_raport $detail_ekskul_raport)
    {
        return view('detail_ekskul_raport.show', compact('detail_ekskul_raport'));
    }

    public function edit(detail_ekskul_raport $detail_ekskul_raport)
    {
        return view('detail_ekskul_raport.edit', compact('detail_ekskul_raport'));
    }

    public function update(Request $request, detail_ekskul_raport $detail_ekskul_raport)
    {
        $validator = Validator::make($request->all(), [
            'id_raport' => 'required',
            'id_ekskul' => 'required',
            'nilai' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $input["updated_by"] = 1;

        $detail_ekskul_raport->update($input);

        return redirect()->route('detail_ekskul_raport.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(detail_ekskul_raport $detail_ekskul_raport)
    {
        $detail_ekskul_raport->delete();

        return redirect()->route('detail_ekskul_raport.index')->with('success', 'Data berhasil dihapus');
    }
}
