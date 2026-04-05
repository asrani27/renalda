<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Bantuan::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('tahun', 'like', '%' . $search . '%')
                  ->orWhere('sumber', 'like', '%' . $search . '%');
            });
        }

        $bantuan = $query->latest()->paginate(10);

        return view('admin.bantuan.index', compact('bantuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:2099',
            'nilai' => 'required|integer|min:0',
            'sumber' => 'required|in:APBD,HIBAH',
            'deskripsi' => 'nullable|string',
        ]);

        Bantuan::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
            'nilai' => $request->nilai,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.bantuan.index')
            ->with('success', 'Data Bantuan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bantuan $bantuan)
    {
        return view('admin.bantuan.edit', compact('bantuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bantuan $bantuan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:2099',
            'nilai' => 'required|integer|min:0',
            'sumber' => 'required|in:APBD,HIBAH',
            'deskripsi' => 'nullable|string',
        ]);

        $bantuan->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
            'nilai' => $request->nilai,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.bantuan.index')
            ->with('success', 'Data Bantuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bantuan $bantuan)
    {
        $bantuan->delete();

        return redirect()->route('admin.bantuan.index')
            ->with('success', 'Data Bantuan berhasil dihapus.');
    }
}