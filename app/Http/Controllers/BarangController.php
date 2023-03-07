<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::latest()->get();

        return view('barang.index', compact('barang'));
    }
    public function index_test()
    {
        $barang = Barang::latest()->get();

        return view('home', compact('barang'));
    }

    public function view_barang()
    {
        $barang = Barang::latest()->get();

        return view('view_barang', compact('barang'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga_barang' => 'required|min:3|max:50',
            'foto' => 'required'
        ]);

        $barang = $request->all();
        $barang['foto'] = $request->file('foto')->store('foto', 'public');
        Barang::create($barang);

        return redirect()->route('barang')->with('sukses', 'Data Berhasil di-Tambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $barang = Barang::findorfail($id);

        return view('barang.edit', compact('kategori', 'barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga_barang' => 'required|min:3|max:50',
        ]);

        $barang = Barang::findorfail($id);

        $fileName = 'public/' . $barang->foto;

        $barang->update($request->all());
        if ($request->hasFile('foto')) {
            Storage::disk('local')->delete($fileName);

            $file = $request->file('foto')->store('foto', 'public');
            $barang->foto = $file;
            $barang->save();
        }

        return redirect()->route('barang')->with('sukses', 'Data Berhasil di-Tambahkan');
    }

    public function delete($id)
    {
        $barang = Barang::findorfail($id);
        $fileName = 'public/' . $barang->foto;
        if ($barang) {
            Storage::disk('local')->delete($fileName);
        }
        $barang->delete();

        return redirect()->route('barang')->with('sukses', 'Data Berhasil di-Hapus');
    }
}
