<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KetersediaanDosen;
use App\Models\User;
use Illuminate\Http\Request;

class KetersediaanController extends Controller
{
    public function index()
    {
        $dosens = User::where('role', 'dosen')
            ->with('ketersediaan')
            ->orderBy('name', 'asc')
            ->paginate(15);

        return view('admin.ketersediaan.index', ['dosens' => $dosens]);
    }

    public function edit(string $id)
    {
        $dosen = User::where('role', 'dosen')->findOrFail($id);

        $ketersediaan = KetersediaanDosen::firstOrNew([
            'user_id' => $dosen->id
        ]);

        $unavailableSlots = $ketersediaan->unavailable_slots ?? [];

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $timeSlots = [
            '07:00 - 08:40',
            '08:50 - 10:30',
            '10:40 - 12:20',
            '13:30 - 15:10',
            '15:20 - 17:00',
        ];

        return view('admin.ketersediaan.edit', [
            'dosen' => $dosen,
            'unavailableSlots' => $unavailableSlots,
            'days' => $days,
            'timeSlots' => $timeSlots
        ]);
    }

    public function update(Request $request, string $id)
    {
        $dosen = User::where('role', 'dosen')->findOrFail($id);

        $unavailableSlots = $request->input('unavailable_slots', []);

        KetersediaanDosen::updateOrCreate(
            ['user_id' => $dosen->id],
            ['unavailable_slots' => $unavailableSlots]
        );

        return redirect()->route('admin.ketersediaan.index')
                         ->with('success', 'Ketersediaan untuk ' . $dosen->name . ' berhasil diperbarui.');
    }
}