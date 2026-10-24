<?php

namespace App\Http\Controllers;

use App\Models\kategori_pengaduan;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = pengaduan::all();
        return view('admin.pengaduan.tampil', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $kategori = kategori_pengaduan::all();
        return view('admin.pengaduan.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'kategori_id' => 'required',
            'isi'  => 'required|string',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
        }

        Pengaduan::create([
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'isi'          => $request->isi,
            'foto'         => $fotoPath,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengaduan $pengaduan)
    {
        $kategori = kategori_pengaduan::all();
        return view('admin.pengaduan.edit', compact('pengaduan','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'kategori_id'  => 'required',
            'isi'          => 'required|string',
            'foto'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
                Storage::disk('public')->delete($pengaduan->foto);
            }

            $namaFile = $request->file('foto')->store('foto', 'public');
        } else {
            $namaFile = $pengaduan->foto;
        }

        $pengaduan->update([
            'kategori_id'  => $request->kategori_id,
            'isi'          => $request->isi,
            'foto'         => $namaFile,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
            Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();
        return redirect()->route('pengaduan.index')
                        ->with('success', 'Data dan foto berhasil dihapus!');
    }
}
