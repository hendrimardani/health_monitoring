<?php

namespace App\Http\Controllers;
use App\Models\Farmasi;
use Illuminate\Http\Request;

class DashboardAdminFarmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmasis = Farmasi::all();
        return view('dashboard.admin.farmasi.index', [
            'title' => 'Farmasi',
            'farmasis' => $farmasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.farmasi.create', [
            'title' => 'Tambah Farmasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required'
        ]);

        Farmasi::create($validatedData);

        return redirect('/dashboard/admin/farmasi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Farmasi $farmasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $farmasi = Farmasi::findOrFail($id);
        return view('dashboard.admin.farmasi.edit', [
            'title' => 'Farmasi',
            'farmasi' => $farmasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farmasi $farmasi)
    {
        $rules = [
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Farmasi::where('id', $farmasi->id)
                ->update($validatedData);

        return redirect('/dashboard/admin/farmasi')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $farmasi = Farmasi::find($id);
        if ($farmasi) {
            $farmasi->delete();
            return redirect('/dashboard/admin/farmasi')->with('success_delete', 'Data Berhasil Dihapus');
        }
    }
}
