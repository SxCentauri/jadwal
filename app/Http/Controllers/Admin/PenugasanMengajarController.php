<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenugasanMengajar;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenugasanMengajarController extends Controller
{
    public function index()
    {
        $penugasan = PenugasanMengajar::with(['mataKuliah', 'dosen'])
            ->orderBy('semester', 'asc')
            ->orderBy('kelas', 'asc')
            ->paginate(15);

        return view('admin.penugasan.index', ['penugasan' => $penugasan]);
    }

    public function create()
    {
        $mataKuliahs = MataKuliah::orderBy('nama_mata_kuliah', 'asc')->get();
        $dosens = User::where('role', 'dosen')->orderBy('name', 'asc')->get();

        return view('admin.penugasan.create', [
            'mataKuliahs' => $mataKuliahs,
            'dosens' => $dosens
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => [
                'required',
                Rule::exists('users', 'id')->where(function ($query) {
                    return $query->where('role', 'dosen');
                })
            ],
            'sks' => 'required|integer|min:1|max:10',
            'kelas' => 'required|string|max:50',
            'semester' => ['required', Rule::in(['ganjil', 'genap'])],
            'time_block' => ['required', Rule::in(['full', 'pra-uts', 'pasca-uts'])],
        ]);

        PenugasanMengajar::create($request->all());

        return redirect()->route('admin.penugasan.index')->with('success', 'Penugasan Mengajar berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $penugasan = PenugasanMengajar::findOrFail($id);
        $mataKuliahs = MataKuliah::orderBy('nama_mata_kuliah', 'asc')->get();
        $dosens = User::where('role', 'dosen')->orderBy('name', 'asc')->get();

        return view('admin.penugasan.edit', [
            'penugasan' => $penugasan,
            'mataKuliahs' => $mataKuliahs,
            'dosens' => $dosens
        ]);
    }

    public function update(Request $request, string $id)
    {
        $penugasan = PenugasanMengajar::findOrFail($id);

        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => [
                'required',
                Rule::exists('users', 'id')->where(function ($query) {
                    return $query->where('role', 'dosen');
                })
            ],
            'sks' => 'required|integer|min:1|max:10',
            'kelas' => 'required|string|max:50',
            'semester' => ['required', Rule::in(['ganjil', 'genap'])],
            'time_block' => ['required', Rule::in(['full', 'pra-uts', 'pasca-uts'])],
        ]);

        $penugasan->update($request->all());

        return redirect()->route('admin.penugasan.index')->with('success', 'Penugasan Mengajar berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penugasan = PenugasanMengajar::findOrFail($id);
        $penugasan->delete();

        return redirect()->route('admin.penugasan.index')->with('success', 'Penugasan Mengajar berhasil dihapus.');
    }
}
