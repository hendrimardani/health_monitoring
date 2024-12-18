<?php

namespace App\Http\Controllers;

use App\Models\Farmasi;
use App\Models\Obat;
use Illuminate\Http\Request;

class DashboardAdminObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::with('farmasi')->paginate(10);
        return view('dashboard.admin.obat.index', [
            'title' => 'Obat',
            'obats' => $obats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $farmasis = Farmasi::all();
        return view('dashboard.admin.obat.create', [
            'title' => 'Obat',
            'farmasis' => $farmasis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_perusahaan' => 'required|exists:farmasis,id',
            'nama_obat' => 'required',
            // 'kategori' => 'required',
            'dosis_tersedia' => 'required',
            'unit' => 'required'
        ]);

        Obat::create($validatedData);

        return redirect('/dashboard/admin/obat')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        $farmasis = Farmasi::all();
        return view('dashboard.admin.obat.edit', [
            'title' => 'Obat',
            'obat' => $obat,
            'farmasis' => $farmasis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $validatedData = $request->validate([
            'farmasi_id' => 'required|exists:farmasis,id',
            'nama_obat' => 'required',
            'kategori' => 'required',
            'unit' => 'required'
        ]);

        Obat::where('id', $obat->id)
            ->update($validatedData);

        return redirect('/dashboard/admin/obat')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        if ($obat) {
            $obat->delete();
            return redirect('/dashboard/admin/obat')->with('success_delete', 'Data Berhasil Dihapus');
        }
    }
}
