<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kriteria::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            });
        }

        $kriteria = $query->latest()->paginate(10);

        return view('admin.kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:100',
        ]);

        Kriteria::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('admin.kriteria.index')
            ->with('success', 'Data Kriteria berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:100',
        ]);

        $kriteria->update([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('admin.kriteria.index')
            ->with('success', 'Data Kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('admin.kriteria.index')
            ->with('success', 'Data Kriteria berhasil dihapus.');
    }
}