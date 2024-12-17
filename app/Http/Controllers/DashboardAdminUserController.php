<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DashboardAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('dashboard.admin.user.index', [
            'title' => 'User',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.user.create', [
            'title' => 'User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'password' => 'required',
                'email' => 'required',
                'role' => 'required|in:pasien,dokter',
                // Validasi khusus pasien
                'nik' => 'required_if:role,pasien|nullable',
                'no_telepon' => 'required_if:role,pasien|nullable',
                'usia' => 'required_if:role,pasien|nullable',
                'jenis_kelamin' => 'required_if:role,pasien|nullable',
                'alamat' => 'required_if:role,pasien|nullable',
                'riwayat_penyakit' => 'required_if:role,pasien|nullable',
                // Validasi khusus dokter
                'no_telepon_dokter' => 'required_if:role,dokter|nullable',
                'spesialisasi' => 'required_if:role,dokter|nullable'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        // Data untuk tabel `users`
        $userData = [
            'nama' => $validatedData['nama'],
            'password' => $validatedData['password'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role']
        ];
        User::create($userData);
        // Simpan data berdasarkan role
        if ($request->role === 'pasien') {
            // Data untuk tabel `pasiens`
            $userId = User::latest()->first();
            $pasienData = [
                'id_pasien' => $userId->id,
                'nama' => $validatedData['nama'],
                'nik' => $validatedData['nik'],
                'no_telepon' => $validatedData['no_telepon'],
                'usia' => $validatedData['usia'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'alamat' => $validatedData['alamat'],
                'riwayat_penyakit' => $validatedData['riwayat_penyakit']
            ]; 
            Pasien::create($pasienData);
        } else {
            // Data untuk tabel `dokters`
            $userId = User::latest()->first();
            $dokterData = [
                'id_dokter' => $userId->id,
                'nama_dokter' => $validatedData['nama'],
                'no_telepon_dokter' => $validatedData['no_telepon_dokter'],
                'spesialisasi' => $validatedData['spesialisasi']
            ];
            Dokter::create($dokterData);
        }

        return redirect('/dashboard/admin/user')->with('success', 'Data Berhasil Ditambahkan');
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
        $user = User::findOrFail($id);
        return view('dashboard.admin.user.edit', [
            'title' => 'User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|in:pasien,dokter'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::where('id', $id)
            ->update($validatedData);
        
        return redirect('/dashboard/admin/user')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if( $user ) {
            $user->delete();
            return redirect('/dashboard/admin/user')->with('sucess_delete', 'Data Berhasil Dihapus');
        }
    }
}
