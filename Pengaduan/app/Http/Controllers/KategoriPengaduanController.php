<?php

namespace App\Http\Controllers;

use App\Models\kategori_pengaduan;
use Illuminate\Http\Request;

class KategoriPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allKategori=kategori_pengaduan::all();
        return view('admin.kategori.tampil', compact('allKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nama_kategori'=>'required|max:255',
        ]);

        Kategori_pengaduan::create($validatedData);

        return redirect()->route('kategori_pengaduan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori_pengaduan $kategori_pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori_Pengaduan $kategori_pengaduan)
    {
        return view('admin.kategori.edit', compact('kategori_pengaduan'));
    }

    public function update(Request $request, Kategori_Pengaduan $kategori_pengaduan)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:255',
        ]);

        $kategori_pengaduan->update($validatedData);

        return redirect()->route('kategori_pengaduan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori_Pengaduan $kategori_pengaduan)
    {
        $kategori_pengaduan->delete();
        
        return redirect()->route('kategori_pengaduan.index');
    }
}
