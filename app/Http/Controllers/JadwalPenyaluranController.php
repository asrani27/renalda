<?php

namespace App\Http\Controllers;

use App\Models\JadwalPenyaluran;
use App\Models\Pendamping;
use Illuminate\Http\Request;

class JadwalPenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JadwalPenyaluran::with('pendamping');

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }

        $jadwalPenyaluran = $query->latest()->paginate(10);

        return view('admin.jadwalpenyaluran.index', compact('jadwalPenyaluran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendamping = Pendamping::all();
        return view('admin.jadwalpenyaluran.create', compact('pendamping'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'pendamping_id' => 'nullable|exists:pendamping,id',
        ]);

        JadwalPenyaluran::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'pendamping_id' => $request->pendamping_id,
        ]);

        return redirect()->route('admin.jadwalpenyaluran.index')
            ->with('success', 'Jadwal Penyaluran berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPenyaluran $jadwalpenyaluran)
    {
        $pendamping = Pendamping::all();
        return view('admin.jadwalpenyaluran.edit', compact('jadwalpenyaluran', 'pendamping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPenyaluran $jadwalpenyaluran)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'pendamping_id' => 'nullable|exists:pendamping,id',
        ]);

        $jadwalpenyaluran->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'pendamping_id' => $request->pendamping_id,
        ]);

        return redirect()->route('admin.jadwalpenyaluran.index')
            ->with('success', 'Jadwal Penyaluran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPenyaluran $jadwalpenyaluran)
    {
        $jadwalpenyaluran->delete();

        return redirect()->route('admin.jadwalpenyaluran.index')
            ->with('success', 'Jadwal Penyaluran berhasil dihapus.');
    }
}
