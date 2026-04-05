<?php

namespace App\Http\Controllers;

use App\Models\SerahTerima;
use App\Models\Pendamping;
use App\Models\Penerima;
use Illuminate\Http\Request;

class SerahTerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SerahTerima::with(['penerima', 'pendamping']);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nomor_bast', 'like', '%' . $search . '%')
                  ->orWhereHas('penerima', function($subQuery) use ($search) {
                      $subQuery->whereHas('calonPenerima', function($calonQuery) use ($search) {
                          $calonQuery->where('nama', 'like', '%' . $search . '%');
                      });
                  })
                  ->orWhereHas('pendamping', function($subQuery) use ($search) {
                      $subQuery->where('nama', 'like', '%' . $search . '%');
                  });
            });
        }

        $serahTerima = $query->latest()->paginate(10);

        return view('admin.serahterima.index', compact('serahTerima'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendamping = Pendamping::all();
        $penerima = Penerima::with('calonPenerima')->get();
        return view('admin.serahterima.create', compact('pendamping', 'penerima'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima,id',
            'pendamping_id' => 'required|exists:pendamping,id',
            'nomor_bast' => 'required|string|max:255',
            'tanggal_bast' => 'required|date',
            'foto_bast' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'penerima_id' => $request->penerima_id,
            'pendamping_id' => $request->pendamping_id,
            'nomor_bast' => $request->nomor_bast,
            'tanggal_bast' => $request->tanggal_bast,
        ];

        // Handle file upload
        if ($request->hasFile('foto_bast')) {
            $file = $request->file('foto_bast');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/serah_terima'), $filename);
            $data['foto_bast'] = $filename;
        }

        SerahTerima::create($data);

        return redirect()->route('admin.serahterima.index')
            ->with('success', 'Serah Terima Bantuan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SerahTerima $serahterima)
    {
        $pendamping = Pendamping::all();
        $penerima = Penerima::with('calonPenerima')->get();
        return view('admin.serahterima.edit', compact('serahterima', 'pendamping', 'penerima'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SerahTerima $serahterima)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima,id',
            'pendamping_id' => 'required|exists:pendamping,id',
            'nomor_bast' => 'required|string|max:255',
            'tanggal_bast' => 'required|date',
            'foto_bast' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'penerima_id' => $request->penerima_id,
            'pendamping_id' => $request->pendamping_id,
            'nomor_bast' => $request->nomor_bast,
            'tanggal_bast' => $request->tanggal_bast,
        ];

        // Handle file upload
        if ($request->hasFile('foto_bast')) {
            // Delete old photo if exists
            if ($serahterima->foto_bast && file_exists(public_path('uploads/serah_terima/' . $serahterima->foto_bast))) {
                unlink(public_path('uploads/serah_terima/' . $serahterima->foto_bast));
            }

            $file = $request->file('foto_bast');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/serah_terima'), $filename);
            $data['foto_bast'] = $filename;
        }

        $serahterima->update($data);

        return redirect()->route('admin.serahterima.index')
            ->with('success', 'Serah Terima Bantuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SerahTerima $serahterima)
    {
        // Delete photo if exists
        if ($serahterima->foto_bast && file_exists(public_path('uploads/serah_terima/' . $serahterima->foto_bast))) {
            unlink(public_path('uploads/serah_terima/' . $serahterima->foto_bast));
        }

        $serahterima->delete();

        return redirect()->route('admin.serahterima.index')
            ->with('success', 'Serah Terima Bantuan berhasil dihapus.');
    }
}