<?php

namespace App\Http\Controllers;

use App\Models\PenyaluranBantuan;
use App\Models\JadwalPenyaluran;
use App\Models\Penerima;
use Illuminate\Http\Request;

class PenyaluranBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PenyaluranBantuan::with(['jadwalPenyaluran', 'penerima']);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('status', 'like', '%' . $search . '%')
                  ->orWhereHas('jadwalPenyaluran', function($subQuery) use ($search) {
                      $subQuery->where('nama', 'like', '%' . $search . '%');
                  })
                  ->orWhereHas('penerima', function($subQuery) use ($search) {
                      $subQuery->whereHas('calonPenerima', function($calonQuery) use ($search) {
                          $calonQuery->where('nama', 'like', '%' . $search . '%');
                      });
                  });
            });
        }

        $penyaluranBantuan = $query->latest()->paginate(10);

        return view('admin.penyaluranbantuan.index', compact('penyaluranBantuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwalPenyaluran = JadwalPenyaluran::all();
        $penerima = Penerima::with('calonPenerima')->get();
        return view('admin.penyaluranbantuan.create', compact('jadwalPenyaluran', 'penerima'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jadwal_penyaluran_id' => 'required|exists:jadwal_penyaluran,id',
            'penerima_id' => 'required|exists:penerima,id',
            'status' => 'required|in:dalam proses,salur',
        ]);

        PenyaluranBantuan::create([
            'tanggal' => $request->tanggal,
            'jadwal_penyaluran_id' => $request->jadwal_penyaluran_id,
            'penerima_id' => $request->penerima_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.penyaluranbantuan.index')
            ->with('success', 'Penyaluran Bantuan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenyaluranBantuan $penyaluranbantuan)
    {
        $jadwalPenyaluran = JadwalPenyaluran::all();
        $penerima = Penerima::with('calonPenerima')->get();
        return view('admin.penyaluranbantuan.edit', compact('penyaluranbantuan', 'jadwalPenyaluran', 'penerima'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenyaluranBantuan $penyaluranbantuan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jadwal_penyaluran_id' => 'required|exists:jadwal_penyaluran,id',
            'penerima_id' => 'required|exists:penerima,id',
            'status' => 'required|in:dalam proses,salur',
        ]);

        $penyaluranbantuan->update([
            'tanggal' => $request->tanggal,
            'jadwal_penyaluran_id' => $request->jadwal_penyaluran_id,
            'penerima_id' => $request->penerima_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.penyaluranbantuan.index')
            ->with('success', 'Penyaluran Bantuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenyaluranBantuan $penyaluranbantuan)
    {
        $penyaluranbantuan->delete();

        return redirect()->route('admin.penyaluranbantuan.index')
            ->with('success', 'Penyaluran Bantuan berhasil dihapus.');
    }
}