<?php

namespace App\Http\Controllers;

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
            ]);
        } catch(ValidationException $e) {
            dd($e->errors());
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = 'dokter';
        User::create($validatedData);

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
            'role' => 'required'
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
