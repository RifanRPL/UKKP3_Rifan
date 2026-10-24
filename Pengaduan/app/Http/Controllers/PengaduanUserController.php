<?php

namespace App\Http\Controllers;

use App\Models\kategori_pengaduan;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->get();
        return view('cust.pengaduan.tampil', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori_pengaduan::all();
        return view('cust.pengaduan.formPengaduan', compact('kategori'));
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

        return redirect()->route('pengaduan_customer.index')->with('success', 'Pengaduan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengaduan $pengaduan_customer)
    {
        $pengaduan = $pengaduan_customer;
        return view('cust.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengaduan $pengaduan_customer)
    {
        $kategori = kategori_pengaduan::all();
        $pengaduan = $pengaduan_customer;
        return view('cust.pengaduan.edit', compact('pengaduan','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan_customer)
    {
        $request->validate([
            'kategori_id'  => 'required',
            'isi'          => 'required|string',
            'foto'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengaduan_customer->foto && Storage::disk('public')->exists($pengaduan_customer->foto)) {
                Storage::disk('public')->delete($pengaduan_customer->foto);
            }

            $namaFile = $request->file('foto')->store('foto', 'public');
        } else {
            $namaFile = $pengaduan_customer->foto;
        }

        $pengaduan_customer->update([
            'kategori_id'  => $request->kategori_id,
            'isi'          => $request->isi,
            'foto'         => $namaFile,
        ]);

        return redirect()->route('pengaduan_customer.index')->with('success', 'Pengaduan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengaduan $pengaduan_customer)
    {
        if ($pengaduan_customer->foto && Storage::disk('public')->exists($pengaduan_customer->foto)) {
            Storage::disk('public')->delete($pengaduan_customer->foto);
        }

        $pengaduan_customer->delete();
        return redirect()->route('pengaduan_customer.index')
                        ->with('success', 'Data dan foto berhasil dihapus!');
    }
}
