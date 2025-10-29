<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::orderBy('nama_ruangan', 'asc')->paginate(10);
        return view('admin.ruangan.index', ['ruangans' => $ruangans]);
    }

    public function create()
    {
        return view('admin.ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255|unique:ruangans',
        ]);

        Ruangan::create($request->all());

        return redirect()->route('admin.ruangan.index')->with('success', 'Data Ruangan berhasil ditambahkan.');
    }

    public function edit(Ruangan $ruangan)
    {
        return view('admin.ruangan.edit', ['ruangan' => $ruangan]);
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'nama_ruangan' => [
                'required',
                'string',
                'max:255',
                Rule::unique('ruangans')->ignore($ruangan->id),
            ],
        ]);

        $ruangan->update($request->all());

        return redirect()->route('admin.ruangan.index')->with('success', 'Data Ruangan berhasil diperbarui.');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('admin.ruangan.index')->with('success', 'Data Ruangan berhasil dihapus.');
    }
}

