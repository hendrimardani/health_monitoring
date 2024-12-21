<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function cariObatJson(string $kategoriId, string $namaObat, string $dosis)
    {
        // Query Eloquent untuk mencari obat
        $obats = Obat::where('kategori_id', $kategoriId)
                    ->where('nama_obat', $namaObat)
                    ->where('dosis_tersedia', $dosis)
                    ->select('id', 'nama_obat') // Pilih kolom yang dibutuhkan
                    ->get();

        // Cek jika data obat ditemukan
        if ($obats) {
            return response()->json([
                'success' => true,
                'obats' => $obats
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan.'
            ]);
        }
    }
}
