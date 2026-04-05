<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\CalonPenerima;
use App\Models\Bantuan;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $penerimas = Penerima::with(['calonPenerima', 'bantuan'])
            ->when($search, function($query) use ($search) {
                $query->whereHas('calonPenerima', function($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                })
                ->orWhereHas('bantuan', function($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                })
                ->orWhere('status_penerima', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.penerima.index', compact('penerimas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $calonPenerimas = CalonPenerima::where('status_verif', 'valid')->get();
        $bantuans = Bantuan::all();
        return view('admin.penerima.create', compact('calonPenerimas', 'bantuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'calon_penerima_id' => 'required|exists:calon_penerima,id',
            'bantuan_id' => 'required|exists:bantuan,id',
            'status_penerima' => 'required|in:Proses,Disetujui,Ditolak',
            'tanggal_penyaluran' => 'nullable|date',
            'catatan' => 'nullable|string',
        ]);

        Penerima::create($validated);

        return redirect()->route('admin.penerima.index')
            ->with('success', 'Data penerima bantuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerima $penerima)
    {
        $penerima->load(['calonPenerima', 'bantuan']);
        return view('admin.penerima.show', compact('penerima'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerima $penerima)
    {
        $calonPenerimas = CalonPenerima::where('status_verif', 'valid')->get();
        $bantuans = Bantuan::all();
        return view('admin.penerima.edit', compact('penerima', 'calonPenerimas', 'bantuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerima $penerima)
    {
        $validated = $request->validate([
            'calon_penerima_id' => 'required|exists:calon_penerima,id',
            'bantuan_id' => 'required|exists:bantuan,id',
            'status_penerima' => 'required|in:Proses,Disetujui,Ditolak',
            'tanggal_penyaluran' => 'nullable|date',
            'catatan' => 'nullable|string',
        ]);

        $penerima->update($validated);

        return redirect()->route('admin.penerima.index')
            ->with('success', 'Data penerima bantuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerima $penerima)
    {
        $penerima->delete();

        return redirect()->route('admin.penerima.index')
            ->with('success', 'Data penerima bantuan berhasil dihapus.');
    }
}
