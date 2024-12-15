<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DashboardPasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user saat ini login
        $pasiens = RiwayatPenyakit::with(['pasien.user'])
                                ->where('id_pasien', auth()->id())
                                ->get();
        $pasien = RiwayatPenyakit::with(['pasien.user'])
                                ->where('id_pasien', auth()->id())
                                ->first();
        $riwayatPenyakit = RiwayatPenyakit::where('id_pasien', auth()->id());

        // if ($riwayatPenyakit->keluhan === null) {
        //     $title = 'Akun Saya';
        //     return view('dashboard.pasien.akun', compact('title', 'pasien'));
        // } else {
            return view('dashboard.pasien.riwayat', [
                'title' => 'Riwayat Saya',
                'pasiens' => $pasiens,
                'pasien' => $pasien
            ]);
        // }
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
        try {
            $validatedData = $request->validate([
                'keluhan' => 'required|max:255'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        $validatedData['id_pasien'] = Auth::id();

        RiwayatPenyakit::create($validatedData);
        
        return redirect('/dashboard/pasien/riwayat')->with('success', 'Data Berhasil Ditambahkan');
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

    public function exportRiwayatPDF()
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

    public function exportDiagnosaPDF()
    {
        // $pemeriksaan = Pemeriksaan::with([''])
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
        $pdf = PDF::loadView('pdf.riwayat', $data);

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-riwayat.pdf');

        // // Download file PDF
        // return $pdf->download('laporan-user.pdf');
    }
}
