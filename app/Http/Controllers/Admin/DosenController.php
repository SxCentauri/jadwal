<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules as ValidationRules;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = User::where('role', 'dosen')->orderBy('name', 'asc')->paginate(10);
        return view('admin.dosen.index', ['dosens' => $dosens]);
    }

    public function create()
    {
        return view('admin.dosen.create');
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
            'role' => 'dosen',
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $dosen = User::where('id', $id)->where('role', 'dosen')->firstOrFail();
        return view('admin.dosen.edit', ['dosen' => $dosen]);
    }

    public function update(Request $request, string $id)
    {
        $dosen = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($dosen->id)],
            'password' => ['nullable', 'confirmed', ValidationRules\Password::defaults()],
        ]);

        $dosen->name = $request->name;
        $dosen->email = $request->email;

        if ($request->filled('password')) {
            $dosen->password = Hash::make($request->password);
        }

        $dosen->save();

        return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $dosen = User::findOrFail($id);

        if ($dosen->role === 'dosen') {
            $dosen->delete();
            return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil dihapus.');
        }

        return redirect()->route('admin.dosen.index')->with('error', 'Gagal menghapus data.');
    }
}

