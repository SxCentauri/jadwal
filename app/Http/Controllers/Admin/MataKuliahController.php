<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::orderBy('nama_mata_kuliah', 'asc')
            ->paginate(10);

        return view('admin.matakuliah.index', ['mataKuliahs' => $mataKuliahs]);
    }

    public function create()
    {
        return view('admin.matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mata_kuliah' => 'required|string|max:255|unique:mata_kuliahs',
        ]);

        MataKuliah::create([
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
        ]);

        return redirect()->route('admin.matakuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);

        return view('admin.matakuliah.edit', [
            'matakuliah' => $matakuliah,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);

        $request->validate([
            'nama_mata_kuliah' => ['required', 'string', 'max:255', Rule::unique('mata_kuliahs')->ignore($matakuliah->id)],
        ]);

        $matakuliah->update([
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
        ]);

        return redirect()->route('admin.matakuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);

        $matakuliah->delete();

        return redirect()->route('admin.matakuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}

