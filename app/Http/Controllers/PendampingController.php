<?php

namespace App\Http\Controllers;

use App\Models\Pendamping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PendampingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pendamping::with('user');

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('telp', 'like', '%' . $search . '%')
                  ->orWhere('kecamatan', 'like', '%' . $search . '%');
            });
        }

        $pendamping = $query->latest()->paginate(10);

        return view('admin.pendamping.index', compact('pendamping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendamping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'kecamatan' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'unitkerja' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create user account
        $user = User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Create pendamping data
        Pendamping::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'kecamatan' => $request->kecamatan,
            'jabatan' => $request->jabatan,
            'unitkerja' => $request->unitkerja,
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.pendamping.index')
            ->with('success', 'Data Pendamping berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendamping $pendamping)
    {
        return view('admin.pendamping.edit', compact('pendamping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendamping $pendamping)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'kecamatan' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'unitkerja' => 'nullable|string|max:255',
        ]);

        $pendamping->update([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'kecamatan' => $request->kecamatan,
            'jabatan' => $request->jabatan,
            'unitkerja' => $request->unitkerja,
        ]);

        // Update user name if exists
        if ($pendamping->user) {
            $pendamping->user->update([
                'name' => $request->nama,
            ]);
        }

        return redirect()->route('admin.pendamping.index')
            ->with('success', 'Data Pendamping berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendamping $pendamping)
    {
        // Delete associated user if exists
        if ($pendamping->user) {
            $pendamping->user->delete();
        }

        $pendamping->delete();

        return redirect()->route('admin.pendamping.index')
            ->with('success', 'Data Pendamping berhasil dihapus.');
    }

    /**
     * Create account for existing pendamping
     */
    public function createAccount(Request $request, Pendamping $pendamping)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $pendamping->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        $pendamping->update([
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.pendamping.index')
            ->with('success', 'Akun berhasil dibuat untuk pendamping ' . $pendamping->nama);
    }

    /**
     * Reset password for pendamping account
     */
    public function resetPassword(Request $request, Pendamping $pendamping)
    {
        if (!$pendamping->user) {
            return redirect()->route('admin.pendamping.index')
                ->with('error', 'Pendamping ini belum memiliki akun.');
        }

        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $pendamping->user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.pendamping.index')
            ->with('success', 'Password berhasil direset untuk akun ' . $pendamping->user->username);
    }
}