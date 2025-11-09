<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules as ValidationRules;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = User::where('role', 'user')->orderBy('name', 'asc')->paginate(10);
        return view('admin.mahasiswa.index', ['mahasiswas' => $mahasiswas]);
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', ValidationRules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'email_verified_at' => now(), 
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $mahasiswa = User::where('id', $id)->where('role', 'user')->firstOrFail();
        
        return view('admin.mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($mahasiswa->id)],
            'password' => ['nullable', 'confirmed', ValidationRules\Password::defaults()],
        ]);

        $mahasiswa->name = $request->name;
        $mahasiswa->email = $request->email;

        if ($request->filled('password')) {
            $mahasiswa->password = Hash::make($request->password);
        }

        $mahasiswa->save();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $mahasiswa = User::findOrFail($id);
        
        if ($mahasiswa->role === 'user') {
            $mahasiswa->delete();
            return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
        }

        return redirect()->route('admin.mahasiswa.index')->with('error', 'Gagal menghapus data.');
    }
}