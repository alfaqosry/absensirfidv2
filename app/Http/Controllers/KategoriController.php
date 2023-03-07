<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {

        $kategori = $request->all();
        Kategori::create($kategori);

        return redirect()->route('kategori')->with('sukses', 'Data Berhasil di-Tambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findorfail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {

        $kategori = Kategori::findorfail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori')->with('sukses', 'Data Berhasil di-Update');
    }

    public function delete($id)
    {
        try {
            $kategori = Kategori::findorfail($id);
            $kategori->delete();

            return redirect()->route('kategori')->with('sukses', 'Data Berhasil di-Hapus');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('sukses','Maaf, Masih ada data yang terpaut dengan kategori ini.');
        }
    }
}
