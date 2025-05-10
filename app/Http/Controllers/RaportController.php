<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\orang_tua;
use App\Models\ortu_santri;
use App\Models\Raport;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $raports = Raport::select('id', 'id_santri', 'id_guru', 'id_kelas', 'semester'); // Pilih kolom yang diperlukan

            return DataTables::of($raports)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Menambahkan kolom action untuk tombol Edit dan Delete
                    $editUrl = route('raport.edit', $row->id);
                    $deleteUrl = route('raport.destroy', $row->id);
                    $btn = "<a href='$editUrl' class='btn btn-primary btn-sm'>Edit</a> ";
                    $btn .= "<form action='$deleteUrl' method='POST' style='display:inline-block;'>"
                        . csrf_field() . method_field('DELETE') .
                        "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</button>
                            </form>";
                    return $btn;
                })
                ->rawColumns(['action']) // Mengatur kolom action agar bisa dirender sebagai HTML
                ->make(true);
        }

        return view('raport.index'); // Tampilkan view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $santris = Santri::all();
        $gurus = Guru::all();
        $kelas = Kelas::all();
        return view('raport.create', compact('santris', 'gurus', 'kelas')); // Tampilkan form untuk membuat raport
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'id_santri' => 'required|string',
            'id_guru' => 'required|string',
            'id_kelas' => 'required|string',
            'semester' => 'required|string',
        ]);

        // Menyimpan data raport baru
        Raport::create([
            'id_santri' => $request->id_santri,
            'id_guru' => $request->id_guru,
            'id_kelas' => $request->id_kelas,
            'semester' => $request->semester,
            'created_by' => 1, // Gunakan ID pengguna yang login
        ]);

        return redirect()->route('raport.index')->with('success', 'Raport created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mengambil raport beserta relasi dengan santri, guru, dan kelas
        $raport = Raport::with(['santri', 'guru', 'kelas'])->findOrFail($id);

        return view('raport.show', compact('raport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menemukan raport berdasarkan ID
        $raport = Raport::with(['santri', 'guru', 'kelas'])->findOrFail($id);

        // Mengambil data terkait untuk form dropdown
        $santris = Santri::all();
        $gurus = Guru::all();
        $kelas = Kelas::all();

        return view('raport.edit', compact('raport', 'santris', 'gurus', 'kelas')); // Tampilkan form untuk mengedit raport
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'id_santri' => 'required|string',
            'id_guru' => 'required|string',
            'id_kelas' => 'required|string',
            'semester' => 'required|string',
        ]);

        // Menemukan raport berdasarkan ID
        $raport = Raport::findOrFail($id);

        // Memperbarui data raport
        $raport->update([
            'id_santri' => $request->id_santri,
            'id_guru' => $request->id_guru,
            'id_kelas' => $request->id_kelas,
            'semester' => $request->semester,
            'updated_by' => 1, // Gunakan ID pengguna yang login
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('raport.index')->with('success', 'Raport updated successfully');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy($id)
    {
        // Menemukan raport berdasarkan ID
        $raport = Raport::findOrFail($id);

        // Menandai siapa yang menghapus raport
        $raport->deleted_by = 1;
        $raport->save();

        // Menghapus raport
        $raport->delete();

        return redirect()->route('raport.index')->with('success', 'Raport deleted successfully');
    }

    public function eraport(Request $request)
    {
        try {
            $user = $request->user();
            $orang_tuas = orang_tua::where('no_telepon', '=', $user->wa)->first();
            $orang_tua_santri = ortu_santri::where('id_ortu', '=', $orang_tuas->id)->get();
        } catch (\Exception $e) {
        }
    }


    public function get_kelas()
    {
        try {
            $kelas = Kelas::all();
            return response()->json([
                'success' => true,
                'message' => "success get data",
                'data' => $kelas
            ], 200);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    public function get_all_mapel(Request $request)
    {
        try {
            $user = $request->user();

            // Cari orang tua berdasarkan nomor WhatsApp
            $orang_tua = orang_tua::where('no_telepon', $user->no_wa)->first();

            if (!$orang_tua) {
                return response()->json([
                    'success' => false,
                    'message' => 'Orang tua tidak ditemukan',
                    'data' => null
                ], 404);
            }

            // Ambil relasi ortu_santri
            $ortu_santri = ortu_santri::where('id_orang_tua', $orang_tua->id)->first();

            if (!$ortu_santri) {
                return response()->json([
                    'success' => false,
                    'message' => 'Santri terkait tidak ditemukan',
                    'data' => null
                ], 404);
            }

            // Ambil raport berdasarkan id_santri
            $raport = Raport::where('id_santri', $ortu_santri->id_santri)->get();

            return response()->json([
                'success' => true,
                'message' => 'Data raport berhasil diambil',
                'data' => $raport
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data raport',
                'error' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
