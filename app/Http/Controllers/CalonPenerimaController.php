<?php

namespace App\Http\Controllers;

use App\Models\CalonPenerima;
use App\Models\Pendamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonPenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $calonPenerima = CalonPenerima::with('pendamping')
            ->when($search, function($query) use ($search) {
                $query->where('nik', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('usaha', 'like', "%{$search}%")
                    ->orWhere('telp', 'like', "%{$search}%")
                    ->orWhere('status_verif', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.calonpenerima.index', compact('calonPenerima', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendamping = Pendamping::all();
        return view('admin.calonpenerima.create', compact('pendamping'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16|unique:calon_penerima,nik',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'usaha' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'pendamping_id' => 'nullable|exists:pendamping,id',
            'dokumen_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'dokumen_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'dokumen_foto_usaha' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'dokumen_sktm' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'dokumen_proposal' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'status_verif' => 'required|in:valid,tidak valid',
            'tanggal_verif' => 'nullable|date',
        ]);

        $validated['status_verif'] = 'tidak valid';
        $validated['tanggal_verif'] = null;

        // Handle file uploads
        $files = ['dokumen_ktp', 'dokumen_kk', 'dokumen_foto_usaha', 'dokumen_sktm', 'dokumen_proposal'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $validated[$file] = $request->file($file)->store('dokumen/calonpenerima', 'public');
            }
        }

        CalonPenerima::create($validated);

        return redirect()->route('admin.calonpenerima.index')
            ->with('success', 'Data calon penerima berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalonPenerima $calonpenerima)
    {
        $pendamping = Pendamping::all();
        return view('admin.calonpenerima.edit', compact('calonpenerima', 'pendamping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalonPenerima $calonpenerima)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16|unique:calon_penerima,nik,' . $calonpenerima->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'usaha' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'pendamping_id' => 'nullable|exists:pendamping,id',
            'dokumen_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'dokumen_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'dokumen_foto_usaha' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'dokumen_sktm' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'dokumen_proposal' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'status_verif' => 'required|in:valid,tidak valid',
            'tanggal_verif' => 'nullable|date',
        ]);

        // Set tanggal_verif if status is valid and tanggal_verif is not set
        if ($validated['status_verif'] === 'valid' && !$calonpenerima->tanggal_verif) {
            $validated['tanggal_verif'] = now();
        }

        // Handle file uploads
        $files = ['dokumen_ktp', 'dokumen_kk', 'dokumen_foto_usaha', 'dokumen_sktm', 'dokumen_proposal'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                // Delete old file if exists
                if ($calonpenerima->$file) {
                    Storage::disk('public')->delete($calonpenerima->$file);
                }
                $validated[$file] = $request->file($file)->store('dokumen/calonpenerima', 'public');
            }
        }

        $calonpenerima->update($validated);

        return redirect()->route('admin.calonpenerima.index')
            ->with('success', 'Data calon penerima berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalonPenerima $calonpenerima)
    {
        // Delete associated files
        $files = ['dokumen_ktp', 'dokumen_kk', 'dokumen_foto_usaha', 'dokumen_sktm', 'dokumen_proposal'];
        foreach ($files as $file) {
            if ($calonpenerima->$file) {
                Storage::disk('public')->delete($calonpenerima->$file);
            }
        }

        $calonpenerima->delete();

        return redirect()->route('admin.calonpenerima.index')
            ->with('success', 'Data calon penerima berhasil dihapus.');
    }
}