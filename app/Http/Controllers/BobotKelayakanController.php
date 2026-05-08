<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class BobotKelayakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimas = Penerima::with(['calonPenerima', 'bantuan'])
            ->latest()
            ->paginate(10);
            
        return view('admin.bobotkelayakan.index', compact('penerimas'));
    }

    /**
     * Show the form for editing bobot kelayakan.
     */
    public function edit(Penerima $penerima)
    {
        $kriterias = Kriteria::all();
        $penerima->load(['calonPenerima', 'bantuan', 'nilaiKriteria']);
        
        return view('admin.bobotkelayakan.edit', compact('penerima', 'kriterias'));
    }

    /**
     * Store or update bobot kelayakan.
     */
    public function update(Request $request, Penerima $penerima)
    {
        $request->validate([
            'skor' => 'required|array',
            'skor.*' => 'required|integer|min:1|max:5',
        ]);

        foreach ($request->skor as $kriteriaId => $skor) {
            NilaiKriteria::updateOrCreate(
                [
                    'penerima_id' => $penerima->id,
                    'kriteria_id' => $kriteriaId,
                ],
                [
                    'skor' => $skor,
                ]
            );
        }

        return redirect()->route('admin.bobotkelayakan.index')
            ->with('success', 'Bobot kelayakan berhasil disimpan.');
    }
}