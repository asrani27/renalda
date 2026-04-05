<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Penerima;
use App\Models\Pendamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Monitoring::with(['penerima', 'pendamping']);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kondisi_usaha', 'like', '%' . $search . '%')
                  ->orWhere('perkembangan_usaha', 'like', '%' . $search . '%')
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

        $monitoring = $query->latest()->paginate(10);

        return view('admin.monitoring.index', compact('monitoring'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerima = Penerima::with('calonPenerima')->get();
        $pendamping = Pendamping::all();
        return view('admin.monitoring.create', compact('penerima', 'pendamping'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima,id',
            'pendamping_id' => 'required|exists:pendamping,id',
            'tanggal_monitoring' => 'required|date',
            'kondisi_usaha' => 'required|string',
            'perkembangan_usaha' => 'required|in:baik,cukup,kurang',
            'foto_monitoring' => 'nullable|image|max:2048',
        ]);

        $data = [
            'penerima_id' => $request->penerima_id,
            'pendamping_id' => $request->pendamping_id,
            'tanggal_monitoring' => $request->tanggal_monitoring,
            'kondisi_usaha' => $request->kondisi_usaha,
            'perkembangan_usaha' => $request->perkembangan_usaha,
        ];

        if ($request->hasFile('foto_monitoring')) {
            $fotoPath = $request->file('foto_monitoring')->store('monitoring', 'public');
            $data['foto_monitoring'] = $fotoPath;
        }

        Monitoring::create($data);

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Monitoring berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        $penerima = Penerima::with('calonPenerima')->get();
        $pendamping = Pendamping::all();
        return view('admin.monitoring.edit', compact('monitoring', 'penerima', 'pendamping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoring $monitoring)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima,id',
            'pendamping_id' => 'required|exists:pendamping,id',
            'tanggal_monitoring' => 'required|date',
            'kondisi_usaha' => 'required|string',
            'perkembangan_usaha' => 'required|in:baik,cukup,kurang',
            'foto_monitoring' => 'nullable|image|max:2048',
        ]);

        $data = [
            'penerima_id' => $request->penerima_id,
            'pendamping_id' => $request->pendamping_id,
            'tanggal_monitoring' => $request->tanggal_monitoring,
            'kondisi_usaha' => $request->kondisi_usaha,
            'perkembangan_usaha' => $request->perkembangan_usaha,
        ];

        if ($request->hasFile('foto_monitoring')) {
            // Delete old photo if exists
            if ($monitoring->foto_monitoring) {
                Storage::disk('public')->delete($monitoring->foto_monitoring);
            }
            $fotoPath = $request->file('foto_monitoring')->store('monitoring', 'public');
            $data['foto_monitoring'] = $fotoPath;
        }

        $monitoring->update($data);

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Monitoring berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        // Delete photo if exists
        if ($monitoring->foto_monitoring) {
            Storage::disk('public')->delete($monitoring->foto_monitoring);
        }

        $monitoring->delete();

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Monitoring berhasil dihapus.');
    }
}