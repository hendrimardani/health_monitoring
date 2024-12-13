<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user saat ini login
        $pasien = Pasien::where('id_pasien', auth()->id())->first();

        if ($pasien->nik === null) {
            $title = 'Akun Saya';
            return view('dashboard.pasien.akun', compact('title', 'pasien'));
        } else {
            return view('dashboard.pasien.riwayat', [
                'title' => 'Riwayat Saya',
                'pasien' => $pasien,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pasien' => 'required',
            'nik' => 'required',
            'no_telepon' => 'required',
            'usia' => 'required',
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'riwayat_penyakit' => 'required|max:255'
        ]);
        $validatedData['id_user'] = Auth::id();

        Pasien::create($validatedData);
        
        return redirect('/dashboard/riwayat')->with('success', 'Data Berhasil Ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportPDF()
    {
        // Data yang akan ditampilkan pada PDF
        $data = [
            'title' => 'Laporan Data User',
            'date' => date('m/d/Y'),
            'users' => [
                ['name' => 'John Doe', 'email' => 'john@example.com'],
                ['name' => 'Jane Doe', 'email' => 'jane@example.com'],
            ]
        ];

        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.template', $data);

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-produk.pdf');

        // // Download file PDF
        // return $pdf->download('laporan-user.pdf');
    }
}
